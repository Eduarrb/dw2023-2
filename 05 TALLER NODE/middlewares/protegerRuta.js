import jwt from 'jsonwebtoken';
import Usuarios from '../models/Usuarios.js';

const protegerRuta = async (req, res, next) => {
    const { _token } = req.cookies;
    if(!_token){
        return res.redirect('/auth/login');
    }

    try {
        const decoded = jwt.verify(_token, process.env.JWT_SECRET);
        const usuario = await Usuarios.scope('eliminarPassword').findByPk(decoded.id);

        if(usuario){
            req.usuario = usuario;
        } else {
            return res.redirect('/auth/login')
        }

        return next();
 
    } catch (error) {
        return res.clearCookie('_token').redirect('/auth/login');
    }
}

const validarAdmin = (req, res, next) => {
    if(req.usuario.rol !== 'admin'){
        return res.redirect('../');
    } 
    next();
}

export {
    protegerRuta,
    validarAdmin
};