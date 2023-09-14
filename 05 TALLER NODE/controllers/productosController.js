import { Productos, Categorias } from '../models/index.js';
import { body, validationResult } from 'express-validator';
import fs from 'fs';

const mostrarProductos = async (req, res) => {
    const productos = await Productos.findAll({
        include: [
            { model: Categorias, as: 'categoria' }
        ]
    });
    // console.log(productos);
    res.render('admin/productos/verProductos.ejs', {
        tituloPagina: 'Kompi - Productos',
        productos
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

const formEditarProducto = async (req, res) => {
    const producto = await Productos.findByPk(req.params.id);
    if(!producto) res.redirect('/admin/productos');
    
    const categorias = await Categorias.findAll();
    res.render('admin/productos/verProducto', {
        tituloPagina: 'Kompi - Editar Producto',
        csrfToken: req.csrfToken(),
        categorias,
        errores: '',
        producto
    })
}

const editarProducto = async (req, res) => {
    const categorias = await Categorias.findAll();
    const producto = await Productos.findByPk(req.params.id);

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
        return res.render(`admin/productos/verProducto`, {
            tituloPagina: 'Kompi - Ediatr Producto',
            errores,
            categorias,
            csrfToken: req.csrfToken(),
            producto
        });
    }
    // console.log(req.file.filename);
    const { categoria: categoriaId, nombre, descripcion, precio, cantidad } = req.body;
    let imagen = '';
    if(req.file){
        imagen = req.file.filename;
        fs.unlink(`public/uploads/productos/${producto.imagen}`, err => {
            if(err){
                console.log('El archvio no se pudo eliminar');
            } else {
                console.log('se borro el archivo');
            }
        })
    } else {
        imagen = producto.imagen;
    }

    try {
        producto.nombre = nombre;
        producto.categoriaId = categoriaId;
        producto.descripcion = descripcion;
        producto.precio = precio;
        producto.cantidad = cantidad;
        producto.imagen = imagen;

        await producto.save();
        req.flash('mensaje', ['Hemos editado el producto correctamente']);
        res.redirect('/admin/productos')
    } catch (error) {
        console.log(error);
    }
    
}

export {
    mostrarProductos,
    formularioProductos,
    guardarProducto,
    formEditarProducto,
    editarProducto
}