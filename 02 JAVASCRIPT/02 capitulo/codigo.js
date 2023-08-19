// console.log('funciona');
// ⚡⚡ VARIABLES
let tarea = document.querySelector('.tarea');
let btn = document.querySelector('button');
let ul = document.querySelector('ul');
let alerta = document.querySelector('.alerta');

let items = document.querySelectorAll('li');

// 1️⃣ AGREGAR LA TAREA A LA LISTA
btn.addEventListener('click', () => {
    // console.log('hiciste click');
    // console.log(tarea.value);
    // ul.innerHTML = `<li>${tarea.value}</li>`;
    // let item = `<li>${tarea.value}</li>`;
    // ul.insertAdjacentHTML('beforeend', item);
    if(tarea.value === ''){
        alerta.innerHTML = 'Debes escribir una tarea 🛑🛑';
    } else {
        alerta.innerHTML = '';
        let item = `<li>${tarea.value}</li>`;
        ul.insertAdjacentHTML('beforeend', item);
        tarea.value = '';
    }
});

// 2️⃣ QUITAR LA TAREA REALIZA
    // 2️⃣.1️⃣ FORMA INCORRECTA Y OBVIA

// console.log(items);
// for(let i = 0; i < items.length; i++){
//     console.log(items[i]);
// }
// tipos de objetos arrays, podemos usar metodos de arrays
// items.forEach(function(el, indice){
//     // console.log(indice, el);
//     el.addEventListener('click', function(){
//         el.remove();
//     });
// });

// 3️⃣ EVENT DELEGATION

const eliminarItem = (evento) => {
    // console.log('hiciste click');
    // console.log(evento.target.tagName);
    if(evento.target.tagName === 'LI'){
        // console.log('aqui deberia borrar el elemento');
        evento.target.remove();
    }
}

ul.addEventListener('click', eliminarItem);