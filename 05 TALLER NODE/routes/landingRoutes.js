import express from 'express';

const router = express.Router();

router.get('/', (req, res) => {
    res.render('landing/index', {
        tituloPagina: 'Kompi'
    })
})
router.get('/producto', (req, res) => {
    res.render('landing/producto', {
        tituloPagina: 'kompi - Computadora oferta'
    })
})

export default router;