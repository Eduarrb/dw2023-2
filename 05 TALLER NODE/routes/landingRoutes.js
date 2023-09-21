import express from 'express';
import {
    mostrarProductos,
    mostrarProducto,
    agregarCarrito,
    mostrarCarrito,
} from '../controllers/landingController.js';
import { protegerRuta, activeSession } from '../middlewares/protegerRuta.js';
import { verificarCarrito } from '../middlewares/carrito.js';

const router = express.Router();

router.get('/', activeSession, verificarCarrito, mostrarProductos);
router.get('/producto/:id', activeSession, verificarCarrito, mostrarProducto);

router.post('/producto/cart/:id', protegerRuta, agregarCarrito);
router.get('/cart', protegerRuta,  mostrarCarrito);

export default router;
