import express from 'express';

const router = express.Router();

router.get('/login', (req, res) => {
    res.render('auth/login', {
        tituloPagina: 'Kompi - Login'
    });
})

export default router;
