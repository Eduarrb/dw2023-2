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
                    set_mensaje(display_msj("Usuario registrado satisfactoriamente, Por favor revisa tu bandeja de correo o spam para activar tu cuenta. Esto puede tardar unos minutos", "mensaje"));
                    redirect("register.php");
                }
                else {
                    echo display_msj("Lo sentimos, no se pudo efectuar el registro, intente más tarde", "error");
                }
            }
        }
    }

    function post_registro($names, $email, $pass){
        $user_token = md5($email);
        $user_pass = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 12));
        $query = query("INSERT INTO usuarios (user_names, user_email, user_pass, user_token) VALUES ('{$names}', '{$email}', '{$user_pass}', '{$user_token}')");
        $mensaje = "Por favor activa tu cuenta mediante este <a href='http://localhost/dw2023-2/04%20CMS/public/activate.php?email={$email}&token={$user_token}' target='_blank'>LINK</a>";
        send_email($email, 'Activar Cuenta', $mensaje);
        return true;
    }

    function postActivarUsuario(){
        if(isset($_GET['email']) && isset($_GET['token'])){
            $user_email = clean_string(trim($_GET['email']));
            $user_token = clean_string(trim($_GET['token']));

            $query = query("SELECT user_id FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
            $fila = fetch_assoc($query);
            $user_id = $fila['user_id'];
            if(contar_filas($query) == 1){
                $query = query("UPDATE usuarios SET user_status = 1, user_token = '' WHERE user_id = {$user_id}");
                set_mensaje(display_msj("Su cuenta ha sido activada, por favor inicie sesión", "mensaje"));
                redirect("login.php");
            } else {
                set_mensaje(display_msj("Los datos no son validos, por favor intente otra vez", "error"));
                redirect("register.php");
            }
        } else {
            set_mensaje(display_msj("Los datos no son validos, por favor intente otra vez", "error"));
            redirect("register.php");
        }
    }

    function validar_user_login(){
        if(isset($_POST['login'])){
            $user_email = clean_string(trim($_POST['user_email']));
            $user_pass = clean_string(trim($_POST['user_pass']));

            if(login_user($user_email, $user_pass)){
                redirect('./');
            } else {
                set_mensaje(display_msj("Tu correo o contraseña son incorrectos, intentalo otra vez", "error"));
                redirect("login.php");
            }
        }
    }

    function login_user($email, $pass){
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}' AND user_status = 1");
        if(contar_filas($query) == 1){
            $fila = fetch_assoc($query);
            $user_id = $fila['user_id'];
            $user_names = $fila['user_names'];
            $user_pass = $fila['user_pass'];
            $user_rol = $fila['user_rol'];

            if(password_verify($pass, $user_pass)){
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_names'] = $user_names;
                $_SESSION['user_rol'] = $user_rol;
                setcookie('email', $email, time() + 60);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
?>