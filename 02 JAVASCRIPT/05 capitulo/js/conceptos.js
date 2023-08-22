// ⚡⚡ EJECUCIONES SINCRONAS Y ASINCRONAS ⚡⚡

// 2️⃣ ASINCRONAS
// setInterval(function(){
//     console.log('esta es una ejecucion asincrona');
// }, 1000);


// 1️⃣ SINCRONAS

let nombre = 'Carlos';
let apellido = 'Perez';

const fullName = () => `${nombre} ${apellido}`;

// console.log(fullName());

// JSON -> javascript object notation

// 3️⃣ FETCH -> devuleven una promesa

// console.log(fetch('data/personas.json'));

// fetch('data/personas.json')
//     .then(function(respuesta){
//         console.log(respuesta.json());
//     });

fetch('https://api.discogs.com/database/search?q=Nirvana&token=mlSGRstNOMcmqYGdVVdCHTIZofNaidlYGgbDOcBU')
    .then((data) => {
        console.log(data.json());
    })