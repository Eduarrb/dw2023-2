// console.log('funciona');
/* ⚡⚡ OBJETOS ⚡⚡ */
/* 
    DOM -> DOCUMENT OBJECT MODEL
    WINDOW
    STRING : COMO UN TIPO DE OBJETO
    ARRAYS: COMO UN TIPO DE OBJETO

    // propiedades, caracteristicas y metodos
    // key - value pair
*/

let celular = {
    model: "galaxy s23",
    color: 'Spacial Gray',
    size: `6.5'`,
    releaseDate: "2018-12-25",
    precio: 4999.99,
    os: 'Android 13',
    accesorios: ['cargador', 'audifonos', 'cable usb-c']
}

console.log(celular.os);
console.log(celular.accesorios[2]);

celular.ram = '8GB';
// console.log(celular);
// console.log('texto'.length)

delete celular.color;
console.log(celular);

let usuario = {
    dni: '78945632',
    nombre: 'Jaimito',
    correo: 'jaimito@gmail.com',
    fechaNac: '2000-10-10',
    // funciones dentro de objetos
    inciarSesion: function(){
        console.log('Bienvenido, iniciaste sesión correctamente');
    },
    mandarCorreo: function(){
        console.log('Enviaste el correo satisfactoriamente')
    }
}

usuario.inciarSesion();
usuario.mandarCorreo();

let personaje = {
    nombre: 'Joshi',
    correo: 'joshi@nintendo.com',
    skills: ['saltar', 'comer caparazones', 'sacar la lengua', 'correr'],
    saltar: function(){
        // console.log(`${personaje.nombre} hizo un gran salto`);
        // la palabra reservada THIS
        // hace referencia al objeto en el cual se este ejecutando
        //console.log(this); // window???
        console.log(`${this.nombre} ha hecho un gran salto`);
    },
    printSkills: function(){
        for(let i = 0; i < this.skills.length; i++){
            console.log(`Skill = ${this.skills[i]}`);
        }
    }
}

personaje.saltar();
personaje.printSkills();
// console.log(this);
// el objeto window es el objeto global en todo js
// console.log(window);
console.log('******************************');

let carro = {
    color: ['blanco', 'turquesa', 'celeste', 'rosita pardo'],
    modelo: 'Sentra',
    numPuertas: 5,
    // 1 metodo para imprimir en consola los colores
    printColors: function(){
        for(let i = 0; i < this.color.length; i++){
            console.log(this.color[i]);
        }
    }
    // 2: uno o mas metodos para imprimir en el html
}

carro.printColors();