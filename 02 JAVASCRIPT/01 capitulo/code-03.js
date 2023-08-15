/* ⚡⚡ TEMPLATE STRINGS ⚡⚡ */

const nombre = 'Eduardo';
let edad = 18;

// mi nombre es Eduardo y tengo 18 años de edad

const res = 'Mi nombre es: ' + nombre + ' y tengo ' + edad + ' años de edad';

console.log(res);

// altgr + }
// alt + 96
const res2 = `Mi nombre es: ${nombre} y tengo ${edad} años de edad`;
console.log(res2);

let plantilla = `
    <p>Hola soy ${nombre}</p>
    <h4>Bienvenido a mi página</h4>
`;

console.log(plantilla);

const bloque1 = document.querySelector('.bloque1');
// console.log(bloque1);

bloque1.innerHTML = plantilla;