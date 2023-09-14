<?php
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    // echo "<h1>" . DS . "</h1>";

    // C:\xampp\htdocs\dw2023-2\04 CMS\resources\views\front
    defined("VIEW_FRONT") ? null : define("VIEW_FRONT", __DIR__ . DS . "views" . DS ."front");
    defined("VIEW_BACK") ? null : define("VIEW_BACK", __DIR__ . DS . "views" . DS ."back");
    // echo __DIR__;
    // echo VIEW_FRONT;
    // echo VIEW_BACK;
    // DEFINIR LAS CONSTANTES DE CONEXION
    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "root");
    defined("DB_PASS") ? null : define("DB_PASS", "");
    defined("DB_NAME") ? null : define("DB_NAME", "kompi");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // if($conexion){
    //     echo 'conexion exitosa';
    // }
    // include 'controllers/usuariosController.php';
    require_once("caller.php");
?>