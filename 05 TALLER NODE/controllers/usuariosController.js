import Usuarios from '../models/Usuarios.js';
import { body, validationResult } from 'express-validator';
import { generarId } from '../helpers/tokens.js';
import { emailRegistro } from '../helpers/email.js';

const formularioRegistro = (req, res) => {
    res.render('auth/register', {
        tituloPagina: 'Kompi - Register',
        errores: '',
        usuario: '',
        csrfToken: req.csrfToken(),
    });
};

const registrar = async (req, res) => {
    await body('nombre')
        .notEmpty()
        .withMessage('El campo nombre no puede estar vacio')
        .run(req);
    await body('email')
        .isEmail()
        .withMessage('Este campo debe ser un correo válido')
        .run(req);
    await body('password')
        .isLength({ min: 6 })
        .withMessage('El password debe tener mino 6 caracteres')
        .run(req);
    await body('repetirPassword')
        .equals(req.body.password)
        .withMessage('Los password deben coincidir')
        .run(req);

    let resultado = validationResult(req);
    if (!resultado.isEmpty()) {
        let errores = resultado
            .array()
            .reduce((obj, item) => ((obj[item.path] = item.msg), obj), {});
        return res.render('auth/register', {
            tituloPagina: 'Kompi - Register',
            errores,
            usuario: {
                nombre: req.body.nombre,
                email: req.body.email,
            },
            csrfToken: req.csrfToken()
        });
    }
    // 🔥 verificar usuarios duplicados
    const existeUsuario = await Usuarios.findOne({
        where: {
            email: req.body.email,
        },
    });

    if (existeUsuario) {
        return res.render('auth/register', {
            tituloPagina: 'Kompi - Register',
            errores: {
                email: 'Este correo ya esta registrado',
            },
            usuario: {
                nombre: req.body.nombre,
                email: req.body.email,
            },
            csrfToken: req.csrfToken()
        });
    }

    // 🔥🔥Almacenar los datos del usuario
    const { nombre, email, password } = req.body;
    const usuario = await Usuarios.create({
        nombre,
        email,
        password,
        token: generarId(),
    });

    emailRegistro({
        nombre: usuario.nombre,
        email: usuario.email,
        token: usuario.token,
    });

    res.render('auth/login', {
        tituloPagina: 'Kompi - Login',
        mensaje:
            'Hemos enviado un correo de verificación, por favor revisa tu bandeja de entrada',
    });
};

const confirmar = async (req, res) => {
    const { token } = req.params;

    const usuario = await Usuarios.findOne({
        where: {
            token,
        },
    });
    if (!usuario) {
        return res.render('auth/confirmar-cuenta', {
            tituloPagina: 'Kompi - Error de conformación',
            mensaje: 'Error, intenta otra vez',
            error: true,
        });
    }

    usuario.token = '';
    usuario.confirmado = true;

    await usuario.save();
    res.render('auth/confirmar-cuenta', {
        tituloPagina: 'Kompi - Cuenta Confirmada',
        mensaje: 'La cuenta se confirmo correctamente',
        error: false,
    });

};

const formularioLogin = (req, res) => {
    res.render('auth/login', {
        tituloPagina: 'Kompi - Login',
        mensaje: '',
    });
};

const formularioOlvidePass = (req, res) => {
    res.render('auth/olvidePass', {
        tituloPagina: 'Kompi - Recuperar password',
    });
};

export {
    formularioRegistro,
    formularioLogin,
    formularioOlvidePass,
    registrar,
    confirmar,
};
