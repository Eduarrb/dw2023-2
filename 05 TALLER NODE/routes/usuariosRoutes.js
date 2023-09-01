import express from 'express';

import {
    formularioRegistro,
    formularioLogin,
    formularioOlvidePass,
    resetPassword,
    registrar,
    confirmar,
    comprobarToken,
    nuevoPassword
} from '../controllers/usuariosController.js';

const router = express.Router();

router.get('/login', formularioLogin);

router.get('/register', formularioRegistro);
router.post('/register', registrar);
router.get('/confirmar/:token', confirmar);

router.get('/olvide-password', formularioOlvidePass);
router.post('/olvide-password', resetPassword);
router.get('/olvide-password/:token', comprobarToken)
router.post('/olvide-password/:token', nuevoPassword)

export default router;
