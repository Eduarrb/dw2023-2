/* ⚡⚡ ARROW FUNCTIONS ⚡⚡ */

// funcion de expresion
saludar();
function saludar(){
    console.log('hola a todos');
}

// funcion de flecha
let saludar2 = () => {
    // console.log('hola a todos');
    return 'hola mundo';
}

let saludo = saludar2();
console.log(saludo);

let suma = (a, b) => {
    console.log(a+ b);
}
suma(12, 3);

let saludar3 = (nombre) => {
    return `Hola ${nombre}`;
}
let saludar4 = nombre => {
    return `Hola ${nombre}`;
}
let saludar5 = nombre => `Hola ${nombre}`;
let saludar6 = (nombre, apellido) => `Hola ${nombre} ${apellido}`;


let saludo2 = saludar6('Karina', 'Rodriguez');
console.log(saludo2);