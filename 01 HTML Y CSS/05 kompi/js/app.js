// console.log('Funcionaaaaaaaaaa');
// DOM => DOCUMENT OBJECT MODEL
/*
    function(){
        algoritmo o codigo
    }

*/
const nav = document.querySelector('.nav');

window.addEventListener('scroll', function(){
    // console.log('hiciste scroll');
    // console.log(window.pageYOffset);
    // console.log(scrollY);
    if(scrollY > 31){
        // console.log('es mayor a 31');
        nav.classList.add('activar');
    } else {
        // console.log('es menor a 31');
        nav.classList.remove('activar');
    }
});