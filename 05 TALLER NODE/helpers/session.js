import jwt from 'jsonwebtoken';
import Usuarios from '../models/Usuarios.js';

const activeSession = async (req, res) => {
    const { _token } = req.cookies;
    if(!_token){
        return {};
    } else {
        try {
            const decoded = jwt.verify(_token, process.env.JWT_SECRET);
            const usuario = await Usuarios.scope('eliminarPassword').findByPk(decoded.id);
            return usuario
        } catch (error) {
            console.log(error);
        }
    }
}

export default activeSession;