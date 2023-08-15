/* ⚡⚡ ARRAYS ⚡⚡ */
// CONJUNTO DE ELEMENTOS

let numeros = [23, 89, 53, 846, 2.6];
console.log(numeros);
console.log(numeros[2]); // 53
console.log(numeros[numeros.length - 1])

let mixto = [875364, 12, true, 'Eduardo', 666];
console.log(mixto[2]);
console.log(typeof(mixto[2]));

let mixto2 = [213, 89, ["Juancito", "Perales"], [12.3, true], {"num": 3}];
console.log(mixto2);

// 1️⃣ FOR - LOOP
for(let constante = 0; constante < mixto.length; constante++){
    // ejecutar 
    // console.log('constante:', constante);
    console.log(mixto[constante]);
}
console.log('************************');
for(let c = 0; c < mixto2.length; c++){
    console.log(mixto2[c]);
    for(let j = 0; j < mixto2[c].length; j++){
        console.log(mixto2[c][j]);
    }
}

let global = 'esta es una variable global';

console.log('***********************************');
const nombres = ['Joshi', 'Luigui', 'Peache', 'Kuppa', 'Toad', 'Mario'];

let num1 = 10;
num1 = 15;

let html = '';
console.log(html);

// scope -> ambito, contexto o bloque de ejecucion
for(let c = 0; c < nombres.length; c++){
    // console.log(nombres[c]);
    // html = nombres[c]; // luigui
    // html = html + nombres[c];
    // html = html + `<h1>${nombres[c]}</h1>`;
    html += `<h1>${nombres[c]}</h1>`;

}
console.log('******************************');
console.log(html);
const bloque = document.querySelector('.bloque1');
bloque.innerHTML = html;