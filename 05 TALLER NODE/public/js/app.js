const nav = document.querySelector('.nav');

const menu = document.querySelector('.nav__top__contenedor__menuLeft__menu');

const btn = document.querySelector('.nav__top__contenedor__menuCenter');

window.addEventListener('scroll', function(){
    if(scrollY > 31){
        nav.classList.add('activar');
    } else {
        nav.classList.remove('activar');
    }
});

btn.addEventListener('click', function(){
    menu.classList.toggle('active');
});