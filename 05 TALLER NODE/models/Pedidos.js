import { DataTypes } from 'sequelize';
import db from '../config/db.js';

const Pedidos = db.define('pedidos', {
    pedidoId: {
        type: DataTypes.STRING(50),
        allowNull: false
    },
    usuarioId: {
        type: DataTypes.INTEGER(11),
        allowNull: false
    }
});

export default Pedidos;