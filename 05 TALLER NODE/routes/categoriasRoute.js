import express from 'express';
import { formularioCategorias, registarCategoria } from '../controllers/categoriasController.js';
import {protegerRuta, validarAdmin} from '../middlewares/protegerRuta.js';

const router = express.Router();

router.get(
    '/categorias',
    protegerRuta,
    validarAdmin,
    formularioCategorias
);

router.post(
    '/categorias',
    protegerRuta,
    validarAdmin,
    registarCategoria
)

export default router;