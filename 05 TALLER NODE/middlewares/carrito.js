import { Cart } from "../models/index.js";
const verificarCarrito = async (req, res, next) => {
    if(!req.usuario){
        return next();
    }
    
    const carrito = await Cart.findAll({
        where: {
            usuarioId: req.usuario.id
        }
    })
    req.carritoCanti = carrito.length; 
    next();
}

export {
    verificarCarrito
}