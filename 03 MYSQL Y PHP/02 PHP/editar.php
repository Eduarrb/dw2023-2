<?php 
    ob_start();
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
            <a href="./" class="btn btn-success">HOME</a>
        </div>
        <div class="row justify-content-center">
            <h4 class="text-center col-md-12">Editar pelicula</h4>
            <?php
                // echo $_GET['id'];
                $id = $_GET['id'];
                $query = "SELECT * FROM peliculas WHERE peli_id = {$id}";
                $query_res = mysqli_query($conexion, $query);
                $fila = mysqli_fetch_assoc($query_res);
                // print_r($fila);
            ?>
            <form method="post" class="col-md-6 mt-4 pb-10">
                <div class="form-group">
                    <label for="peli_nombre">Nombre Pelicula</label>
                    <input 
                        type="text" 
                        name="peli_nombre" 
                        class="form-control" 
                        id="peli_nombre" 
                        required
                        value="<?php echo $fila['peli_nombre']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="peli_genero">Género</label>
                    <input 
                        type="text" 
                        name="peli_genero" 
                        class="form-control" 
                        id="peli_genero"
                        value="<?php echo $fila['peli_genero']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="peli_fechaEstreno">Fecha Estreno</label>
                    <input 
                        type="date" 
                        name="peli_fechaEstreno" 
                        class="form-control" 
                        id="peli_fechaEstreno"
                        value="<?php echo $fila['peli_fechaEstreno']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="peli_restricciones">Restricciones</label>
                    <input 
                        type="text" 
                        name="peli_restricciones" 
                        class="form-control" 
                        id="peli_restricciones"
                        value="<?php echo $fila['peli_restricciones']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="peli_img">Imagen URL</label>
                    <input 
                        type="text" 
                        name="peli_img" 
                        class="form-control" 
                        id="peli_img"
                        value="<?php echo $fila['peli_img']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="peli_dire_id">Director</label>
                    <select name="peli_dire_id" id="peli_dire_id" class="form-control" required>
                        <option value="" selected disabled>- Selecciona un director -</option>
                        <?php
                            $query = "SELECT * FROM directores";
                            $query_res = mysqli_query($conexion, $query);
                            while($filaDire = mysqli_fetch_assoc($query_res)){
                                $dire_id = $filaDire['dire_id'];
                                $director = $filaDire['dire_nombres'] . " " . $filaDire['dire_apellidos'];
                                if($dire_id == $fila['peli_dire_id']){
                                    ?>
                                    <option 
                                        value="<?php echo $filaDire['dire_id']; ?>"
                                        selected
                                    >
                                        <?php echo $director; ?>
                                    </option>
                                <?php } else {
                                    ?>
                                    <option value="<?php echo $filaDire['dire_id']; ?>">
                                        <?php echo $director; ?>
                                    </option>
                                <?php }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" value="Editar" name="editar" class="btn btn-primary">
                </div>
            </form>
            <?php
                if(isset($_POST['editar'])){
                    // echo 'funcionaaaaaaaaaaa';
                    $peli_nombre = $_POST['peli_nombre'];
                    // echo $peli_nombre;
                    $peli_genero = $_POST['peli_genero'];
                    $peli_fechaEstreno = $_POST['peli_fechaEstreno'];
                    $peli_restricciones = $_POST['peli_restricciones'];
                    $peli_img = $_POST['peli_img'];
                    $peli_dire_id = $_POST['peli_dire_id'];
                    
                    $query = "UPDATE peliculas SET peli_nombre = '{$peli_nombre}', peli_genero = '{$peli_genero}', peli_fechaEstreno = '{$peli_fechaEstreno}', peli_restricciones = '{$peli_restricciones}', peli_img = '{$peli_img}', peli_dire_id = {$peli_dire_id} WHERE peli_id = {$id}";
                    mysqli_query($conexion, $query);
                    header("Location: ./");
                }
            ?>
        </div>
    </section>
</body>
</html>