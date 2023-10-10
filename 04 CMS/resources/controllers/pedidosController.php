<?php
    function post_pedido(){
        if(!post_validarSesionCliente()){
            set_mensaje(display_msj("Debes estar registrado o iniciar sesión para poder acceder al carrito", "error"));
            redirect("login.php");
        } else {
            if(!isset($_GET['collection_id']) || !isset($_GET['collection_status']) || !isset($_GET['preference_id'])){
                set_mensaje(display_msj("Datos invalidos", "error"));
                redirect("carrito.php?user={$_SESSION['user_id']}");
            } else {
                $ped_pref_id = clean_string(trim($_GET['preference_id']));
                $ped_pay_id = clean_string(trim($_GET['collection_id']));
                $ped_user_id = $_SESSION['user_id'];
                $ped_status = clean_string(trim($_GET['collection_status']));

                $query = query("INSERT INTO pedidos (ped_pref_id, ped_pay_id, ped_user_id, ped_status, ped_fecha) VALUES ('{$ped_pref_id}', {$ped_pay_id}, {$ped_user_id}, '{$ped_status}', NOW())");
                set_mensaje(display_msj("Pedido satisfactorio", "mensaje"));
                redirect("carrito.php?user={$_SESSION['user_id']}");
            }

        }
    }
?>