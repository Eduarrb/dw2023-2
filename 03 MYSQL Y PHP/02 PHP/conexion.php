<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'dw2023_2');
    if(!$conexion){
        // echo 'conexion exitosa';
        die(mysqli_error($conexion));
    }
?>