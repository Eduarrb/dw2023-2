import express from 'express';
import usuariosRoutes from './routes/usuariosRoutes.js';
import expressEjsLayouts from 'express-ejs-layouts';

const app = express();

app.use(expressEjsLayouts);
app.set('view engine', 'ejs');
app.set('views', './views');
app.use(express.static('public'));

app.use('/', usuariosRoutes);

const port = 3000;

app.listen(port, () => {
    console.log(`Corriendo en el puerto ${port}`);
});
