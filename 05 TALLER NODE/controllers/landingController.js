import { Productos, Cart } from '../models/index.js';

const mostrarProductos = async (req, res) => {
    const productos = await Productos.findAll({});
    res.render('landing/index.ejs', {
        tituloPagina: 'Kompi',
        productos,
        usuario: req.usuario,
        carritoCanti: req.carritoCanti
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
        carritoCanti: req.carritoCanti
    });
};

const agregarCarrito = async (req, res) => {
    const producto = await Productos.findByPk(req.params.id);
    const carrito = await Cart.findOne({
        where: {
            usuarioId: req.usuario.id,
            productoId: req.params.id
        }
    })
    if (!producto) res.redirect('/');
    if(carrito) {
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
        res.redirect(`/producto/${req.params.id}`);
    } catch (error) {
        console.log(error);
    }
};

const mostrarCarrito = async (req, res) => {
    const carrito = await Cart.findAll({
        where: {
            usuarioId: req.usuario.id,
        },
        include: [
            { model: Productos, as: 'producto' }
        ]
    })
    res.render('landing/carrito.ejs',{
        tituloPagina: `Kompi - Carrito`,
        csrfToken: req.csrfToken(),
        usuario: req.usuario,
        carritoCanti: carrito.length,
        carrito
    })
}

export { mostrarProductos, mostrarProducto, agregarCarrito, mostrarCarrito };
