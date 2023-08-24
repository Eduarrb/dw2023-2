import express from 'express';
import usuariosRoutes from './routes/usuariosRoutes.js';
const app = express();

app.use('/', usuariosRoutes);

const port = 3000;

app.listen(port, () => {
    console.log(`Corriendo en el puerto ${port}`);
});
