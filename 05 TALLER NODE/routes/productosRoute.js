import express from 'express';
import { prueba } from '../controllers/productosController.js'
import {protegerRuta, validarAdmin} from '../middlewares/protegerRuta.js';

const router = express.Router();

router.get(
    '/productos',
    protegerRuta,
    validarAdmin,
    prueba
);

export default router;