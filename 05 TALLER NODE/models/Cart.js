import { DataTypes } from 'sequelize';
import db from '../config/db.js';

const Cart = db.define('cart', {
    productoId: {
        type: DataTypes.UUID,
        allowNull: false,
    },
    cantidad: {
        type: DataTypes.INTEGER,
        allowNull: false
    },
    usuarioId: {
        type: DataTypes.INTEGER(11),
        allowNull: false
    }
})

export default Cart;