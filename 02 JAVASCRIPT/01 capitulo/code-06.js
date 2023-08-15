/* ⚡⚡ FUNCTIONS ⚡⚡ */
/* function expression */
saludar();
function saludar(){
    console.log('Hola a todos');
}


function sumarNnumeros(){
    console.log(1 + 1);
}

sumarNnumeros();

// 1️⃣ DECLARAR PARAMETROS Y LLAMAR ARGUMENTOS

function calcEdad(fechaNac){
    let edad = 2023 - fechaNac;
    console.log(edad);
}

calcEdad(1990);
calcEdad(1870);

function saludar2(nombre, ciudad, estado){
    let saludo = `Hola, mi nombre es ${nombre}, soy de la ciduad de ${ciudad} y soy ${estado}`;
    console.log(saludo);
}

// let eduardo = 'eduardo';

let name;

saludar2(name, 'Huancayo', 'casado');

// 2️⃣ return
function sumarDosNumeros(a, b){
    // let res = a + b;
    // console.log(res);
    // return res;
    // return a, b, 3;
    return `la suma es ${a + b}`;
}

// return 'hola';
sumarDosNumeros(2,4); // = 6

console.log(sumarDosNumeros(2,4));

let res1 = sumarDosNumeros(3,9); //12
console.log(res1);

const bloque = document.querySelector('.bloque1');
// bloque.innerHTML = `La suma de los numeros es : ${sumarDosNumeros(2,4)}`;
bloque.innerHTML = sumarDosNumeros(5,9);

// 3️⃣ variables globales y locales

let nombre = 'Eduardo';
// parametro esta dentro del scope, ambito, contexto, bloque de la funcion
function saludar3(nombre){
    return `Hola mi nombre es ${nombre}`;
}
let res2 = saludar3(nombre);
console.log(res2);

function saludar4(){
    // en este caso ya que no encuentra una variable interna o parametro busca fuera del scope
    return `hola mi nombre es ${nombre}`;
}

let res3 = saludar4();
console.log(res3);

function saludar5(){
    let nombre = 'eduardo';
    return `hola mi nombre es ${nombre}`;
}
let res4 = saludar5();
console.log(res4);
