// console.log('funcionaaaaaaaaaaa');

const form = document.querySelector('.quiz-form');
const respCorrectas = ['A', 'A', 'A', 'A'];

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
    respUsuario.forEach((valor, indice) => {
        if(valor === respCorrectas[indice]){
            console.log(`La respuesta de la pregunta ${indice + 1} es correcta ⭐`);
        } else {
            console.log(`La respuesta de la pregunta ${indice + 1} es incorrecta 💥💥`);
        }
    })
});