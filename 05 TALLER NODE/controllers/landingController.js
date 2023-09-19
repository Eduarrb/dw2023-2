import { Productos, Cart } from '../models/index.js';
import activeSession from '../helpers/session.js';

const mostrarProductos = async (req, res) => {
    const productos = await Productos.findAll({});
    const usuario = await activeSession(req);
    res.render('landing/index.ejs', {
        tituloPagina: 'Kompi',
        productos,
        usuario,
    });
};

const mostrarProducto = async (req, res) => {
    const producto = await Productos.findByPk(req.params.id);
    const usuario = await activeSession(req);
    if (!producto) {
        return res.redirect('/');
    }
    res.render('landing/producto.ejs', {
        tituloPagina: `Kompi - ${producto.nombre}`,
        csrfToken: req.csrfToken(),
        producto,
        usuario,
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
    // console.log(carrito)
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

export { mostrarProductos, mostrarProducto, agregarCarrito };
