import Usuarios from '../models/Usuarios.js';
import { body, validationResult } from 'express-validator';
import { generarId } from '../helpers/tokens.js';

const formularioRegistro = (req, res) => {
    res.render('auth/register', {
        tituloPagina: 'Kompi - Register',
        errores: '',
        usuario: ''
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
        });
    }
    // 🔥 verificar usuarios duplicados
    const existeUsuario = await Usuarios.findOne({
        where: {
            email: req.body.email
        }
    });

    if(existeUsuario){
        return res.render('auth/register', {
            tituloPagina: 'Kompi - Register',
            errores: {
                email: 'Este correo ya esta registrado'
            },
            usuario: {
                nombre: req.body.nombre,
                email: req.body.email,
            },
        })
    }

    // 🔥🔥Almacenar los datos del usuario
    // const usuario = await Usuarios.create(req.body);
    // res.json(usuario);

    const { nombre, email, password } = req.body;
    await Usuarios.create({
        nombre,
        email, 
        password,
        token: generarId()
    });

    res.render('auth/login',{
        tituloPagina: 'Kompi - Login',
        mensaje: 'Hemos enviado un correo de verificación, por favor revisa tu bandeja de entrada'
    })

};

const formularioLogin = (req, res) => {
    res.render('auth/login', {
        tituloPagina: 'Kompi - Login',
        mensaje: ''
    });
};

const formularioOlvidePass = (req, res) => {
    res.render('auth/olvidePass', {
        tituloPagina: 'Kompi - Recuperar password',
    });
};

export { formularioRegistro, formularioLogin, formularioOlvidePass, registrar };
