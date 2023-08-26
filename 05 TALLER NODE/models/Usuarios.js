import { DataTypes } from 'sequelize';
import db from '../config/db.js';
import bcrypt from 'bcrypt';

// DIRECCION https://sequelize.org/docs/v6/core-concepts/model-basics/

const Usuarios = db.define('usuarios', {
    nombre: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    password: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    rol: {
        type: DataTypes.STRING,
        defaultValue: 'cliente',
        allowNull: false
    },
    token: DataTypes.STRING,
    confirmado: DataTypes.BOOLEAN,
},
/* 🔥🔥 HOOKS
    DIRECCION https://sequelize.org/docs/v6/other-topics/hooks/
*/
{
    hooks: {
        beforeCreate: async function(usuario){
            const salt = await bcrypt.genSalt(10);
            usuario.password = await bcrypt.hash(usuario.password, salt);
        }
    }
}

);

export default Usuarios;