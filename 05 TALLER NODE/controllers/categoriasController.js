import Categorias from '../models/Categorias.js';
import { body, validationResult } from 'express-validator';

const formularioCategorias = (req, res) => {
    res.render('admin/categorias/ver', {
        tituloPagina: 'Kompi - Categorias',
        csrfToken: req.csrfToken(),
        errores: '',
    });
};

const registarCategoria = async (req, res) => {
    await body('nombre')
        .notEmpty()
        .withMessage('El campo no debe estar vacio')
        .run(req);

    let resultado = validationResult(req);
    if (!resultado.isEmpty()) {
        let errores = resultado
            .array()
            .reduce((obj, item) => ((obj[item.path] = item.msg), obj), {});
        return res.render('admin/categorias/ver', {
            tituloPagina: 'Kompi - Categorias',
            csrfToken: req.csrfToken(),
            errores,
        });
    }

    const existeCategoria = await Categorias.findOne({
        where: {
            nombre: req.body.nombre,
        },
    });

    if (existeCategoria) {
        return res.render('admin/categorias/ver', {
            tituloPagina: 'Kompi - Categorias',
            csrfToken: req.csrfToken(),
            errores: { nombre: 'Esta categoria ya esta registrada' },
        });
    }

    const { nombre } = req.body;
    await Categorias.create({
        nombre,
    });

    res.render('admin/categorias/ver', {
        tituloPagina: 'Kompi - Categorias',
        csrfToken: req.csrfToken(),
        errores: '',
        mensaje: 'La categoria se agrego correctamente',
    });
};

export { formularioCategorias, registarCategoria };
