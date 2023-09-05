const formularioProductos = (req, res) => {
    res.render('admin/productos/ver', {
        tituloPagina: 'Kompi - Productos',
        csrfToken: req.csrfToken(),
    });
}

export {
    formularioProductos
}