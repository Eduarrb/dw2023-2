import { Productos, Categorias } from '../models/index.js';
import { body, validationResult } from 'express-validator';

const mostrarProductos = (req, res) => {
    res.render('admin/productos/verProductos.ejs', {
        tituloPagina: 'Kompi - Productos',
    });
}

const formularioProductos = async (req, res) => {
    const categorias = await Categorias.findAll();

    res.render('admin/productos/crearProducto', {
        tituloPagina: 'Kompi - Productos',
        csrfToken: req.csrfToken(),
        categorias,
        errores: '',
        producto: ''
    });
}

const guardarProducto = async (req, res) => {
    const categorias = await Categorias.findAll();

    await body('categoria').isNumeric().withMessage('Seleccione una categoria').run(req);
    await body('nombre').notEmpty().withMessage('El campo nombre no debe estar vacio').run(req);
    await body('descripcion').notEmpty().withMessage('La descripcion es obligatoria').isLength({max: 140}).withMessage('la descripcion solo puede tener 140 caracteres').run(req);
    await body('precio').isNumeric().withMessage('Debe ingresar un precio').run(req);
    await body('cantidad').isNumeric().withMessage('Debe ingresar una cantidad').run(req);
    
    let resultado = validationResult(req);
    if (!resultado.isEmpty()) {
        let errores = resultado
            .array()
            .reduce((obj, item) => ((obj[item.path] = item.msg), obj), {});
        console.log(errores);
        return res.render('admin/productos/crearProducto', {
            tituloPagina: 'Kompi - Productos',
            errores,
            categorias,
            csrfToken: req.csrfToken(),
            producto: req.body
        });
    }
    // console.log(req.file.filename);
    const { categoria: categoriaId, nombre, descripcion, precio, cantidad } = req.body;

    const imagen = req.file.filename;
    // console.log(imagen);

    try {
        await Productos.create({
            categoriaId,
            nombre,
            descripcion,
            precio,
            imagen,
            cantidad
        });
        req.flash('mensaje', ['Hemos creado el producto correctamente']);
        res.redirect('/admin/productos')
    } catch (error) {
        console.log(error);
    }
}

export {
    mostrarProductos,
    formularioProductos,
    guardarProducto
}