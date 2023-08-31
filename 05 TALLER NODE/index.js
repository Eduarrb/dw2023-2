import express from 'express';

import csrf from 'csurf';
import cookieParser from 'cookie-parser';

import landingRoutes from './routes/landingRoutes.js';
import usuariosRoutes from './routes/usuariosRoutes.js';

import expressEjsLayouts from 'express-ejs-layouts';

import db from './config/db.js';

const app = express();

app.use(express.urlencoded({ extended: true }));

app.use(cookieParser());
app.use(csrf({ cookie: true }));

try {
    await db.authenticate();
    db.sync();
    console.log('Conectado a la base de datos');
} catch (error) {
    console.log(error);
}

app.use(expressEjsLayouts);
app.set('view engine', 'ejs');
app.set('views', './views');
app.use(express.static('public'));

app.use('/', landingRoutes);
app.use('/auth', usuariosRoutes);

const port = 3000;

app.listen(port, () => {
    console.log(`Corriendo en el puerto ${port}`);
});
