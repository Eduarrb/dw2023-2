// console.log('funcionaaaaaaaaa');

const btn = document.querySelector('button');
const popupCaja = document.querySelector('.popup-caja');
const popupClose = document.querySelector('.popup-close');

btn.addEventListener('click', () => {
    popupCaja.classList.add('mostrarCaja');
});

popupClose.addEventListener('click', function(){
    popupCaja.classList.remove('mostrarCaja');
});

popupCaja.addEventListener('click', e => {
    // console.log(e);
    if(e.target.classList.contains('popup-caja')){
        // console.log('hiciste click correcto');
        popupCaja.classList.remove('mostrarCaja');
    }
});

window.addEventListener('keyup', e => {
    // console.log(e);
    if(e.code === 'Escape'){
        popupCaja.classList.remove('mostrarCaja');
    }
});
