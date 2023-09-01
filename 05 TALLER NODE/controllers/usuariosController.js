import Usuarios from '../models/Usuarios.js';
import { body, validationResult } from 'express-validator';
import { generarId } from '../helpers/tokens.js';
import { emailRegistro, olvidePassword } from '../helpers/email.js';
import bcrypt from 'bcrypt';

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
            csrfToken: req.csrfToken(),
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
            csrfToken: req.csrfToken(),
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
    res.render('auth/olvide-password', {
        tituloPagina: 'Kompi - Recuperar password',
        csrfToken: req.csrfToken(),
        errores: '',
    });
};

const resetPassword = async (req, res) => {
    await body('email')
        .isEmail()
        .withMessage('Debe ser un correo valido')
        .run(req);
    let resultado = validationResult(req);
    if (!resultado.isEmpty()) {
        let errores = resultado
            .array()
            .reduce((obj, item) => ((obj[item.path] = item.msg), obj), {});
        return res.render('auth/olvide-password', {
            tituloPagina: 'Kompi - Recuperar password',
            errores,
            csrfToken: req.csrfToken(),
        });
    }
    const { email } = req.body;
    const usuario = await Usuarios.findOne({
        where: {
            email,
        },
    });
    if (!usuario) {
        return res.render('auth/olvide-password', {
            tituloPagina: 'Kompi - Recuperar password',
            errores: { email: 'El email no pertenece a ningun usuario' },
            csrfToken: req.csrfToken(),
        });
    }

    usuario.token = generarId();
    await usuario.save();

    olvidePassword({
        email: usuario.email,
        nombre: usuario.nombre,
        token: usuario.token,
    });
    res.render('auth/mensaje', {
        tituloPagina: 'Restablecer Password',
        mensaje: 'Hemos enviado un correo con las instrucciones',
    });
};

const comprobarToken = async (req, res) => {
    const { token } = req.params;
    const usuario = await Usuarios.findOne({
        where: {
            token,
        },
    });
    if (!usuario) {
        return res.render('auth/confirmar-cuenta', {
            tituloPagina: 'Restablecer Password',
            mensaje: 'Error, intenta otra vez',
            error: true,
        });
    }

    res.render('auth/reset-password', {
        tituloPagina: 'Kompi - Recuperar password',
        errores: '',
        csrfToken: req.csrfToken(),
    });
};

const nuevoPassword = async (req, res) => {
    // console.log('guardando password');
    await body('password')
        .isLength({ min: 6 })
        .withMessage('Debe contener min 6 caracteres')
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
        return res.render('auth/reset-password', {
            tituloPagina: 'Kompi - Recuperar password',
            errores,
            csrfToken: req.csrfToken(),
        });
    }

    const { token } = req.params;
    const { password } = req.body;

    const usuario = await Usuarios.findOne({
        where: {
            token,
        },
    });

    const salt = await bcrypt.genSalt(10);
    usuario.password = await bcrypt.hash(password, salt);
    usuario.token = null;
    await usuario.save();

    res.render('auth/confirmar-cuenta', {
        tituloPagina: 'Password Restablecido',
        mensaje: 'El password se guardo satisfactoriamente',
        error: false,
    });
};

export {
    formularioRegistro,
    formularioLogin,
    formularioOlvidePass,
    registrar,
    confirmar,
    resetPassword,
    comprobarToken,
    nuevoPassword,
};
