const formularioRegistro = (req, res) => {
    res.render('auth/register', {
        tituloPagina: 'Kompi - Register'
    })
}

const formularioLogin = (req, res) => {
    res.render('auth/login', {
        tituloPagina: 'Kompi - Login'
    });
}

export {
    formularioRegistro,
    formularioLogin
}