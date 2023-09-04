const formularioProductos = (req, res) => {
    res.render('productos/ver', {
        tituloPagina: 'Kompi - Login',
        csrfToken: req.csrfToken(),
    });
}

export {
    formularioProductos
}