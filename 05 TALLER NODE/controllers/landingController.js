import { Productos, Cart } from '../models/index.js';

const mostrarProductos = async (req, res) => {
    const productos = await Productos.findAll({});
    res.render('landing/index.ejs', {
        tituloPagina: 'Kompi',
        productos,
        usuario: req.usuario,
        carritoCanti: req.carritoCanti,
    });
};

const mostrarProducto = async (req, res) => {
    const producto = await Productos.findByPk(req.params.id);
    if (!producto) {
        return res.redirect('/');
    }
    res.render('landing/producto.ejs', {
        tituloPagina: `Kompi - ${producto.nombre}`,
        csrfToken: req.csrfToken(),
        producto,
        usuario: req.usuario,
        carritoCanti: req.carritoCanti,
    });
};

const agregarCarrito = async (req, res) => {
    const producto = await Productos.findByPk(req.params.id);
    const carrito = await Cart.findOne({
        where: {
            usuarioId: req.usuario.id,
            productoId: req.params.id,
        },
    });
    if (!producto) res.redirect('/');
    if (carrito) {
        console.log('Este producto ya lo agregaste a tu carrito');
        return res.redirect(`/producto/${req.params.id}`);
    }
    const { cantidad } = req.body;
    const usuarioId = req.usuario.id;
    const productoId = producto.id;
    if (cantidad > producto.cantidad) {
        console.log(
            'La cantidad es mayor a lo solicitado, no se puede ejecutar este proceso'
        );
        return res.redirect(`/producto/${req.params.id}`);
    }
    try {
        await Cart.create({
            productoId,
            cantidad,
            usuarioId,
        });
        console.log('producto agregado correctamente al carrito');
        res.redirect(`/cart`);
    } catch (error) {
        console.log(error);
    }
};

const mostrarCarrito = async (req, res) => {
    const carrito = await Cart.findAll({
        where: {
            usuarioId: req.usuario.id,
        },
        include: [{ model: Productos, as: 'producto' }],
    });
    let total = 0;
    carrito.forEach(item => {
        total += item.cantidad * item.producto.precio
    })
    res.render('landing/carrito.ejs', {
        tituloPagina: `Kompi - Carrito`,
        csrfToken: req.csrfToken(),
        usuario: req.usuario,
        carritoCanti: carrito.length,
        carrito,
        total
    });
};

const restarItem = async (req, res) => {
    const item = await Cart.findOne({
        where: {
            productoId: req.params.id,
            usuarioId: req.usuario.id,
        },
    });
    if (!item) {
        console.log(
            'el producto que intentas menorar no esta incluido en tu carrito'
        );
        return res.redirect('back');
    }
    if (item.cantidad === 1) {
        await Cart.destroy({
            where: {
                productoId: req.params.id,
                usuarioId: req.usuario.id,
            },
        });
        console.log('Solo tenias un producto en el carrito y se ha eliminado');
        return res.redirect('back');
    }
    item.cantidad = item.cantidad - 1;
    await item.save();
    console.log('se ha menorado en 1 la cantidad del producto de tu carrito');
    res.redirect('back');
};

const sumarItem = async (req, res) => {
    const item = await Cart.findOne({
        where: {
            productoId: req.params.id,
            usuarioId: req.usuario.id,
        },
        include: [{ model: Productos, as: 'producto' }],
    });
    if (!item) {
        console.log(
            'el producto que intentas agregar no esta incluido en tu carrito'
        );
        return res.redirect('back');
    }
    if (item.cantidad === item.producto.cantidad) {
        console.log('tu solitud sobrepasa la cantidad en almacen');
        return res.redirect('back');
    }
    item.cantidad = item.cantidad + 1;
    await item.save();
    console.log('se ha sumado en 1 la cantidad del producto de tu carrito');
    res.redirect('back');
};

const quitarItem = async (req, res) => {
    const item = await Cart.findOne({
        where: {
            productoId: req.params.id,
            usuarioId: req.usuario.id,
        },
        include: [{ model: Productos, as: 'producto' }],
    });
    if (!item) {
        console.log(
            'el producto que intentas eliminar no esta incluido en tu carrito'
        );
        return res.redirect('back');
    }
    await Cart.destroy({
        where: {
            productoId: req.params.id,
            usuarioId: req.usuario.id,
        },
    });
    console.log('Item eliminado');
    return res.redirect('back');
};

export {
    mostrarProductos,
    mostrarProducto,
    agregarCarrito,
    mostrarCarrito,
    restarItem,
    sumarItem,
    quitarItem
};
