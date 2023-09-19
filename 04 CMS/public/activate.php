<?php require_once("../resources/config.php"); ?>

<?php
    if(!isset($_GET['email']) || !isset($_GET['token'])){
        set_mensaje(display_msj("DAtos de verificacion incompletos", "error"));
        redirect("register.php");
    } else {
        postActivarUsuario();
    }
?>