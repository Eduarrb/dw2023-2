import express from 'express';
import { mostrarProductos, mostrarProducto, agregarCarrito } from '../controllers/landingController.js';
import { protegerRuta } from '../middlewares/protegerRuta.js';

const router = express.Router();

router.get('/', 
    mostrarProductos
);
router.get('/producto/:id', mostrarProducto);

router.post('/producto/cart/:id', protegerRuta, agregarCarrito)

export default router;
