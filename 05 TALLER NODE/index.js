import express from 'express';

import csrf from 'csurf';
import cookieParser from 'cookie-parser';
import flash from 'connect-flash';
import session from 'express-session';

import landingRoutes from './routes/landingRoutes.js';
import usuariosRoutes from './routes/usuariosRoutes.js';
import productosRoutes from './routes/productosRoute.js';

import expressEjsLayouts from 'express-ejs-layouts';

import db from './config/db.js';

const app = express();

app.use(express.urlencoded({ extended: true }));

app.use(cookieParser());
app.use(
    session({
        secret: process.env.SECRETO,
        key: process.env.KEY,
        resave: false,
        saveUninitialized: false
    })
)

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

app.use(flash());
app.use((req, res, next) => {
    res.locals.mensajes = req.flash();
    next();
});

app.use('/', landingRoutes);
app.use('/auth', usuariosRoutes);
app.use('/admin', productosRoutes);

const port = 3000;

app.listen(port, () => {
    console.log(`Corriendo en el puerto ${port}`);
});
