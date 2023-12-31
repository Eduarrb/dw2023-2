import Productos from './Productos.js';
import Categorias from './Categorias.js';
import Usuarios from './Usuarios.js';
import Cart from './Cart.js';
import Pedidos from './Pedidos.js';

Productos.belongsTo(Categorias);
Cart.belongsTo(Productos, {foreignKey: 'productoId'});
Cart.belongsTo(Usuarios, {foreignKey: 'usuarioId'});
Pedidos.belongsTo(Usuarios, {foreignKey: 'usuarioId'});

export {
    Productos,
    Categorias,
    Usuarios,
    Cart,
    Pedidos
}