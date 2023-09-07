<?php 
    include "conexion.php"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pelicomic</title>
</head>
<body>
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos(as) a Pelicomic</h1>
    <section class="container">
        <div class="row p-4">
            <a href="#" class="btn btn-success">Subir Peliculas</a>
            <a href="#" class="btn btn-info ml-2">Directores</a>
        </div>
        <div class="row">
            <!-- 
                CRUD
                C -> CREATE
                R -> READ
                U -> UPDATE
                D -> DELETE 💥💥💥
            -->
            <?php
                $nombre = 'Eduardo';
                $apellido = 'Arroyo';
                // echo $nombre;
                $array1 = ['num', 456, false];
                function sumar($a, $b){
                    // echo $a + $b;
                }
                sumar(2,2);

            ?>

            <div class="col-md-3 mb-4">
                <img src="https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg" alt="" width="100%">
                <h4 class="text-info">Mario Bros - La pelicula</h4>
                <div>
                    <strong>Director: </strong> Peter Jackson
                </div>
                <div>
                    <strong>Rating: </strong> PG-13
                </div>
                <div>
                    <a href="#" class="btn btn-success">editar</a>
                    <a href="#" class="btn btn-danger">borrar</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>