


const obtenerJson = async function(){
    // AWAIT
    const data = await fetch('https://api.discogs.com/database/search?q=Nirvana&token=mlSGRstNOMcmqYGdVVdCHTIZofNaidlYGgbDOcBU');

    console.log(data)
    const res = await data.json();
    console.log(res.results);
}

obtenerJson();