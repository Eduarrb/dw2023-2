// ⚡⚡ NUMBERS

let radio = 56.3;
let pi = 3.1416;

// console.log(radio, pi);
// 1️⃣ OPERACIONES MATEMATICAS

let circunferencia = pi * radio ** 2;
console.log(circunferencia);

let num1 = 10;
let num2 = 5;

let suma1 = num1 + num2;
console.log(suma1);

let num3 = '12';
// let suma2 = num2 + parseInt(num3);
// let suma2 = num2 + Number(num3);
let suma2 = num2 + +num3;
console.log(suma2);

// let num4 = num1 + 2;
// console.log(num4);
// num1 = num1 + 2; // 12
num1 += 2; // -> num1 =  num1 + 2
console.log(num1);

num1 *= 3 // -> num1 = num1 * 3;
console.log(num1);

// 2️⃣ sumarle o restarle una unidad

// num1 = num1 + 1;
num1++; // 37
console.log(num1);
num1--;
console.log(num1);

// 3️⃣ OBJETO MATH

let num4 = 10.8651321354531;
// redondear segun el metodo
let res1 = Math.floor(num4);
console.log(res1);
let res2 = Math.ceil(num4);
console.log(res2);
let res3 = Math.round(num4);
console.log(res3);

let res4 = num4.toFixed(4);
console.log(+res4);
console.log(typeof(res4));