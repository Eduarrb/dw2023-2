<?php
    function post_addCarrito($cantiProducto){
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
            // 2️⃣.1️⃣ validar si ya el producto esta en el carrito
            $query = query("SELECT * FROM carrito WHERE cart_user_id = {$user_id} AND cart_prod_id = {$prod_id}");
            if(contar_filas($query) >= 1){
                set_mensaje(display_msj("Ya cuentas con el producto en tu carrito", "error"));
                redirect("producto.php?id={$prod_id}");
                // 2️⃣.2️⃣ validar la cantidad en stock
            } elseif($prod_canti > $cantiProducto){
                set_mensaje(display_msj("Solo puedes pedir máximo {$cantiProducto} items", "error"));
                redirect("producto.php?id={$prod_id}");
            } else {
                $query = query("INSERT INTO carrito (cart_user_id, cart_prod_id, cart_canti) VALUES ({$user_id}, {$prod_id}, {$prod_canti})");
                set_mensaje(display_msj("Producto Agregado correctamente al carrito", "mensaje"));
                redirect("carrito.php?user={$user_id}");
            }
        }
    }

    function get_carrito(){
        if(!post_validarSesionCliente() || !isset($_GET['user']) || $_GET['user'] != $_SESSION['user_id']){
            redirect("./");
        }
    }

?>