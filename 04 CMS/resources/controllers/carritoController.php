<?php
    function post_addCarrito(){
        if(isset($_POST['addCarrito'])){
            // 1️⃣ VALIDAR SI EL CLIENTE INICIO SESION
            if(!post_validarSesionCliente()){
                set_mensaje(display_msj("Debes iniciar sesion para hacer compras", "error"));
                redirect("login.php");
            }
            // 2️⃣ agregar al carrito
            $user_id = $_SESSION['user_id'];
            $prod_id = clean_string(trim($_GET['id']));
            $prod_canti = clean_string(trim($_POST['prod_canti']));

            $query = query("INSERT INTO carrito (cart_user_id, cart_prod_id, cart_canti) VALUES ({$user_id}, {$prod_id}, {$prod_canti})");
            set_mensaje(display_msj("Producto Agregado correctamente al carrito", "mensaje"));
            redirect("producto.php?id={$prod_id}");
        }
    }

    

?>