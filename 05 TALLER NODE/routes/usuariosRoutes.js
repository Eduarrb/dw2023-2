import express from 'express';

const router = express.Router();

router.get('/', (req, res) => {
    res.send('Hola desde un enrutamiento');
});

router.get('/productos', (req, res) => {
    res.send('Pagina de productos');
});

export default router;
