const btn = document.querySelector('.btn');
const artista = document.querySelector('.search');
const discografiaBloque = document.querySelector('.section__right__contenido__resultado__discografia');
const error = document.querySelector('.section__right__contenido--noResult');

const obtenerJson = async function(artistaSearch){
    // AWAIT
    const data = await fetch(`https://api.discogs.com/database/search?q=${artistaSearch}&type=master&artist=${artistaSearch}&format=album&token=mlSGRstNOMcmqYGdVVdCHTIZofNaidlYGgbDOcBU`);

    // console.log(data)
    const res = await data.json();
    console.log(res.results);
    if(res.results.length < 1){
        error.classList.remove('d-none');
    } else {
        error.classList.add('d-none');
        let plantilla = '';
        res.results.forEach(function(el){
            plantilla += `
                <div class="section__right__contenido__resultado__discografia__item">
                    <h3 class="section__right__contenido__resultado__discografia__item--titulo">${el.title}</h3>
                    <div class="section__right__contenido__resultado__discografia__item__left">
                        <img src="${el.cover_image}" alt="">
                        <div class="section__right__contenido__resultado__discografia__item__left__info">
                            <p>Año: <span>${el.year}</span></p>
                            <p>País: <span>${el.country}</span></p>
                        </div>
                    </div>
                </div>
            `;
        })
        discografiaBloque.innerHTML = plantilla;
    }
}

// obtenerJson();
btn.addEventListener('click', function(){
    // console.log(artista.value);
    obtenerJson(artista.value);
    artista.value = '';
});