import express from 'express';
import { formularioProductos } from '../controllers/productosController.js'
import {protegerRuta, validarAdmin} from '../middlewares/protegerRuta.js';

const router = express.Router();

router.get(
    '/productos',
    protegerRuta,
    validarAdmin,
    formularioProductos
);

export default router;