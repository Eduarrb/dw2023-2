import express from 'express';

import { formularioRegistro, formularioLogin } from '../controllers/usuariosController.js';

const router = express.Router();

router.get('/login', formularioLogin)

router.get('/register', formularioRegistro)

export default router;
