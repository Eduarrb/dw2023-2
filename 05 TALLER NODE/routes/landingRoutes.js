import express from 'express';
import {
    mostrarProductos,
    mostrarProducto,
    agregarCarrito,
    mostrarCarrito,
    restarItem,
    sumarItem,
    quitarItem,
    pedidoSuccess,
    mostrarPedidos
} from '../controllers/landingController.js';
import { protegerRuta, activeSession } from '../middlewares/protegerRuta.js';
import { verificarCarrito } from '../middlewares/carrito.js';

const router = express.Router();

router.get('/', activeSession, verificarCarrito, mostrarProductos);
router.get('/producto/:id', activeSession, verificarCarrito, mostrarProducto);

router.post('/producto/cart/:id', protegerRuta, agregarCarrito);
router.get('/cart', protegerRuta,  mostrarCarrito);

router.post('/cart/restar/:id', protegerRuta, restarItem);
router.post('/cart/sumar/:id', protegerRuta, sumarItem);
router.post('/cart/delete/:id', protegerRuta, quitarItem);
router.get('/cart/success', protegerRuta, pedidoSuccess);
router.get('/pedidos', protegerRuta, verificarCarrito, mostrarPedidos);

export default router;
