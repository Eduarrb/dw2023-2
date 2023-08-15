/*
    JAVASCRIPT: se ejecuta del lado del cliente

    JS MANIPULA EL DOM
    JS es "key sesitive"
    JS no es obligatorio el punto y coma
    DOM = DOCUMENT OBJECT MODEL

    ⚡⚡ TIPOS DE DATOS ⚡⚡
    - STRINGS
    - NUMBERS
    - BOOLEANS
    - OBJETOS (ARRAYS, OBJETOS)
    */


/*
   console.log('funciona');
   
   var nombre = 'Eduardo';
   var apellido = 12;
   var edad = true;
   var total = [12,15,0];
   
   ***********************************************
   ES5
   LET Y CONST
*/

// ⚡⚡ STRINGS = CADENAS DE TEXTO
let nombre = 'Eduardo';
let apellido = 'Arroyo';

// 1️⃣ CONCATENAR
let fullName = nombre + ' ' + apellido;
console.log(fullName);

// 2️⃣ PROPIEDADES
console.log(fullName.length);
let oracion = "esta es una oracion que nos dio la profesora de lenguaje sjkahgdakjshdgsaygdksaludsa";

console.log(oracion.length);

// 3️⃣ INDICES -> son numeros de asignacion de posicion que inicia en el 0

console.log(fullName[0]);
console.log(fullName[13]);
console.log(oracion[oracion.length - 1]);

const dominio = 'continental.edu.pe';

// REALIZAR el correo coorporativo = 
// earroyo@continental.edu.pe
// jgonzales@continental.edu.pe

// console.log('earroyo@continental.edu.pe'); 🛑

let correo = nombre[0] + apellido + '@' + dominio;
console.log(correo);

// 4️⃣ METODOS
console.log(correo.toLowerCase());