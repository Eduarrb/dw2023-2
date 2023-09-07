import express from 'express';
import { formularioProductos, mostrarProductos, guardarProducto } from '../controllers/productosController.js'
import {protegerRuta, validarAdmin} from '../middlewares/protegerRuta.js';

const router = express.Router();

router.get(
    '/productos',
    protegerRuta,
    validarAdmin,
    mostrarProductos
);

router.get(
    '/productos/crear',
    protegerRuta,
    validarAdmin,formularioProductos
);

router.post(
    '/productos/crear',
    protegerRuta,
    validarAdmin,
    guardarProducto
)

export default router;