import Productos from './Productos.js';
import Categorias from './Categorias.js';
import Usuarios from './Usuarios.js';

Productos.belongsTo(Categorias);

export {
    Productos,
    Categorias,
    Usuarios
}