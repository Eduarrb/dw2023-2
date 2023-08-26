import express from 'express';

import {
    formularioRegistro,
    formularioLogin,
    formularioOlvidePass,
    registrar
} from '../controllers/usuariosController.js';

const router = express.Router();

router.get('/login', formularioLogin);

router.get('/register', formularioRegistro);
router.post('/register', registrar);

export default router;
