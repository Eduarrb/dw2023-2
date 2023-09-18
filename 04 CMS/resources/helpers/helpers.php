<?php
    function query($sql){
        global $conexion;
        return mysqli_query($conexion, $sql);
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
?>