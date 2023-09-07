import express from 'express';
import { formularioProductos, mostrarProductos, guardarProducto } from '../controllers/productosController.js'
import {protegerRuta, validarAdmin} from '../middlewares/protegerRuta.js';
import subirImagen from '../middlewares/subirArchivo.js';

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
    subirImagen,
    guardarProducto
)

export default router;