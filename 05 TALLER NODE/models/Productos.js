import { DataTypes } from 'sequelize';
import db from '../config/db.js';

const Productos = db.define('productos', {
    id: {
        type: DataTypes.UUID,
        defaultValue: DataTypes.UUIDV4,
        allowNull: false,
        primaryKey: true,
    },
    nombre: {
        type: DataTypes.STRING(100),
        allowNull: false,
    },
    descripcion: {
        type: DataTypes.TEXT,
        allowNull: false,
    },
    imagen: {
        type: DataTypes.STRING,
        // allowNull: false,
    },
    activo: {
        type: DataTypes.BOOLEAN,
        allowNull: false,
        defaultValue: true,
    },
    cantidad: {
        type: DataTypes.INTEGER,
        allowNull: false,
    },
    precio: {
        type: DataTypes.DOUBLE,
        allowNull: false,
    },
    oferta: {
        type: DataTypes.DOUBLE,
    },
});

export default Productos;