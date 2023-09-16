<?php
    function validar_user_registro(){
        $min = 3;
        $max = 10;
        $errores = [];

        if(isset($_POST['register'])){
            $user_names = clean_string(trim($_POST['user_names']));
            $user_email = clean_string(trim($_POST['user_email']));
            $user_pass = clean_string(trim($_POST['user_pass']));
            $pass_confirm = clean_string(trim($_POST['pass_confirm']));

            if(strlen($user_names) < $min){
                $errores[] = "Tus nombres no deben ser menos de {$min} caracteres";
            }
            if(strlen($user_names) > $max){
                $errores[] = "Tus nombres no deben ser mas de {$max} caracteres";
            }
            // true || false
            if(email_existe($user_email)){
                $errores[] = "El correo ingresado ya existe, intente con otra cuenta";
            }
            if($user_pass != $pass_confirm){
                $errores[] = "Las contraseñas deben ser iguales";
            }

            if(!empty($errores)){
                foreach($errores as $error){
                    echo display_msj($error, "error");
                }
            } else {
                if(post_registro($user_names, $user_email, $user_pass)){
                    // header("Location: register.php");
                    echo display_msj("Registro satisfactorio", "mensaje");
                    redirect("register.php");
                }
                else {
                    echo display_msj("Lo sentimos, no se pudo efectuar el registro, intente más tarde", "error");
                }
            }
        }
    }

    function post_registro($names, $email, $pass){
        $query = query("INSERT INTO usuarios (user_names, user_email, user_pass) VALUES ('{$names}', '{$email}', '{$pass}')");
        return true;
    }
?>