import express from 'express';

import {
    formularioLogin,
    autenticar,
    cerrarSesion,
    formularioRegistro,
    formularioOlvidePass,
    resetPassword,
    registrar,
    confirmar,
    comprobarToken,
    nuevoPassword,
    restablecerConfirmar
} from '../controllers/usuariosController.js';

const router = express.Router();

router.get('/login', formularioLogin);
router.post('/login', autenticar);

router.get(
    '/cerrar-sesion',
    cerrarSesion
)

router.get('/register', formularioRegistro);
router.post('/register', registrar);
router.get('/confirmar/:token', confirmar);

router.get('/olvide-password', formularioOlvidePass);
router.post('/olvide-password', resetPassword);
router.get('/olvide-password/:token', comprobarToken);
router.post('/olvide-password/:token', nuevoPassword);

router.get('/restablecer-confirmar', restablecerConfirmar);

export default router;
