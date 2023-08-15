/* ⚡⚡ CONDICONALES & BOOLEANOS ⚡⚡ */
/*
    VALORES: true o false

    OPERADORES LOGICOS Y DE COMPARACION
    IGUALDAD ==, ===

    ASIGNACION -> =

    COMPARACION
    >, >=, <, <=, !true: false, !false: true, !=, !==
*/

if (1 === '1') {
    // si es verdadero se ejecuta este bloque de codigo
    console.log('1 es igual que 1');
} else {
    // si es falso se ejecuta esta parte del codigo
    console.log('no son iguales');
}

let num = 4;

if(num >= 10){
    console.log('el numero es mayor igual que 10');
}
if(num < 3){
    console.log('el numero es menor que 3');
} else {
    console.log('el numero es mayor que 3');
}

let bool = true;

if(bool === 1){
    console.log('bool es igual que 1');
}

if(!bool){
    console.log('es verdadero');
} else {
    console.log('es falso');
}