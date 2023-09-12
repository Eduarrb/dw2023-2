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
            <a href="crear.php" class="btn btn-success">Subir Peliculas</a>
            <a href="directores" class="btn btn-info ml-2">Directores</a>
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

            <?php
                // $query = "SELECT * FROM peliculas";
                $query = "SELECT
                    a.peli_id, 
                    a.peli_nombre,
                    a.peli_img,
                    CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director,
                    a.peli_restricciones
                        FROM peliculas a
                            LEFT JOIN directores b ON a.peli_dire_id = dire_id";
                $res_query = mysqli_query($conexion, $query);
                // echo $res_query;
                // print_r($res_query);
                $array2 = ["nombre" => "Eduardo", "apellido" => "Arroyo"];
                // key - value pair
                $array3 = ["id" => 1, "peli_nombre" => "spiderman"]; // -> true
                $areay4 = []; // -> false

                // $fila = mysqli_fetch_array($res_query);
                // $fila = mysqli_fetch_assoc($res_query);
                // print_r($fila);
                $c = 1;
                while($fila = mysqli_fetch_assoc($res_query)){
                    // echo "array " . $c++;
                    // print_r($fila);
                    // echo "<br>";
                    // echo "<h4>Spiderman</h4>";
                    ?>
                        <div class="col-md-3 mb-4">
                            <img src="<?php echo $fila['peli_img']; ?>" alt="" width="100%">
                            <h4 class="text-info"><?php echo $fila['peli_nombre']; ?></h4>
                            <div>
                                <strong>Director: </strong> <?php echo $fila['director']; ?>
                            </div>
                            <div>
                                <strong>Rating: </strong> <?php echo $fila['peli_restricciones']; ?>
                            </div>
                            <div>
                                <a href="editar.php?id=<?php echo $fila['peli_id']; ?>" class="btn btn-success">editar</a>
                                <a href="borrar.php?id=<?php echo $fila['peli_id']; ?>" class="btn btn-danger">borrar</a>
                            </div>
                        </div>
                <?php }
            ?>

            <!-- <div class="col-md-3 mb-4">
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
            </div> -->
        </div>
    </section>
</body>
</html>