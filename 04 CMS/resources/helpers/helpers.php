<?php
    function query($sql){
        global $conexion;
        return mysqli_query($conexion, $sql);
    }

    function fetch_assoc($query){
        return mysqli_fetch_assoc($query);
    }

    function clean_string($str){
        global $conexion;
        return mysqli_real_escape_string($conexion, $str);
    }

    function email_existe($email){
        global $conexion;
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}'");
        if(mysqli_num_rows($query) >= 1){
            return true;
        }
        return false;
    }

    function display_msj($msj, $tipo){
        return "<p class='{$tipo}'>{$msj}</p>";
    }

    function redirect($location){
        header("Location: {$location}");
    }

    function set_mensaje($msj){
        if(!empty($msj)){
            $_SESSION['mensaje'] = $msj;
        } else {
            $msj = '';
        }
    }

    function mostrar_msj(){
        if(isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
    }

    function contar_filas($query){
        return mysqli_num_rows($query);
    }

    function validarAdmin(){
        if(!isset($_COOKIE['email'])){
            session_destroy();
            redirect("../login.php");
        }
        if($_SESSION['user_rol'] != 'admin'){
            set_mensaje(display_msj("No tienes autorización!!!", "error"));
            redirect("../login.php");
        }
    }
    function existeItem($tabla, $campo, $id){
        $query = query("SELECT * FROM {$tabla} WHERE {$campo} = {$id}");
        if(contar_filas($query) == 1){
            return true;
        }
        return false;
    }
    
    function post_validarSesionCliente(){
        if(isset($_SESSION['user_rol']) && isset($_SESSION['user_names']) && isset($_SESSION['user_id'])){
            return true;
        }
        return false;
    }

?>