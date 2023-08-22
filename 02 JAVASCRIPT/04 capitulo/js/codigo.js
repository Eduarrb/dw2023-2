// console.log('funcionaaaaaaaaaaa');

const form = document.querySelector('.quiz-form');
const respCorrectas = ['A', 'A', 'A', 'A'];
const resultado = document.querySelector('.result');

form.addEventListener('submit', function(e){
    e.preventDefault();

    // console.log(form.q1.value); // +25
    // console.log(form.q2.value); // +25
    // console.log(form.q3.value); // +25
    // console.log(form.q4.value); // +25

    // 1️⃣ validar las respuestas y calcular el resultado
    const respUsuario = [
        form.q1.value,
        form.q2.value,
        form.q3.value,
        form.q4.value
    ];
    // console.log(respUsuario);
    // respUsuario.forEach(function(valor, indice){
    //     console.log(indice, valor);
    // })
    let puntaje = 0; 

    respUsuario.forEach((valor, indice) => {
        if(valor === respCorrectas[indice]){
            console.log(`La respuesta de la pregunta ${indice + 1} es correcta ⭐`);
            // puntaje = puntaje + 25;
            puntaje += 25;
        } else {
            console.log(`La respuesta de la pregunta ${indice + 1} es incorrecta 💥💥`);
        }
    });
    
    // console.log(puntaje);
    // resultado.querySelector('span').textContent = puntaje;
    // resultado.classList.remove('d-none');

    let posicionY = scrollY; // loop para que vaya menorando la posicion en el eje y
    // console.log(posicionY);

    // setInterval(function(){
    //     console.log('Soy un mensaje');
    // }, 3000);
    let animacionTop = setInterval(function(){
        // console.log('animacion cada segundo');
        if(posicionY <= 0){
            // console.log('ya es menor o igual que 0');
            clearInterval(animacionTop);
        } else {
            // posicionY = posicionY - 10;
            posicionY -= 10
            // console.log(posicionY);
            scrollTo(0, posicionY);
        }
    }, 10);

    resultado.querySelector('span').textContent = `${0}%`;
    resultado.classList.remove('d-none');

    let sumaPuntajeTotal = 0;

    let animacionPuntaje = setInterval(() => {
        // puntaje = 100
        if(sumaPuntajeTotal === puntaje) {
            clearInterval(animacionPuntaje);
        } else {
            sumaPuntajeTotal += 5;
        }

        resultado.querySelector('span').textContent = `${sumaPuntajeTotal}%`;
    }, 50);
});