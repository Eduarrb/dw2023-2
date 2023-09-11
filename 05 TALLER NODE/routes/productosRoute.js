import express from 'express';
import { formularioProductos, mostrarProductos, guardarProducto, formEditarProducto, editarProducto } from '../controllers/productosController.js'
import {protegerRuta, validarAdmin} from '../middlewares/protegerRuta.js';
import subirImagen from '../middlewares/subirArchivo.js'

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

router.get(
    '/productos/editar/:id',
    protegerRuta,
    validarAdmin,
    formEditarProducto
)

router.post(
    '/productos/editar/:id',
    protegerRuta,
    validarAdmin,
    subirImagen,
    editarProducto
)

export default router;