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

    function get_carritoIcon(){
        if(post_validarSesionCliente()){
            $query = query("SELECT cart_canti FROM carrito WHERE cart_user_id = {$_SESSION['user_id']}");
            $canti = contar_filas($query);
            $link = <<<DELIMITER
                <a href="carrito.php?user={$_SESSION['user_id']}" class="nav__top__contenedor__menuRight__menu__item--link">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span>{$canti}</span>
                </a>
DELIMITER;
            echo $link;
        } else {
            $link = <<<DELIMITADOR
                <a href="carrito.php" class="nav__top__contenedor__menuRight__menu__item--link">
                    <i class="fa-solid fa-bag-shopping"></i>
                </a>
DELIMITADOR;
            echo $link;
        }
    }

    function get_carrito(){
        if(!post_validarSesionCliente() || !isset($_GET['user']) || $_GET['user'] != $_SESSION['user_id']){
            set_mensaje(display_msj("Debes estar registrado o iniciar sesión para poder acceder al carrito", "error"));
            redirect("login.php");
        } else {
            $user_id = $_SESSION['user_id'];
            $query = query("SELECT * FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE cart_user_id = {$user_id}");
            $total = 0;
            while($fila = fetch_assoc($query)){
                $subTotal = $fila['cart_canti'] * $fila['prod_precio'];
                $total += $subTotal;
                $producto = <<<DELIMITER
                    <div class="main__contenedor__table__body__fila">
                        <div class="main__contenedor__table__body__fila--name data-nombre">
                            {$fila['prod_nombre']}
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-desc">
                            {$fila['prod_descri']}
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-img">
                            <img src="img/productos/{$fila['prod_img']}" alt="{$fila['prod_nombre']}" />
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-precio">
                            S/ {$fila['prod_precio']}
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-canti">
                            {$fila['cart_canti']}
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-canti">
                            S/ {$subTotal}
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-ac">
                            <form method="post">
                                <input type="hidden" name="prod_id" value="{$fila['cart_prod_id']}">
                                <button type="submit" class="main__contenedor__table__body__fila--name--restar" name="prod_restar">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </form>
                            <form method="post">
                                <input type="hidden" name="prod_id" value="{$fila['cart_prod_id']}">
                                <button type="submit" class="main__contenedor__table__body__fila--name--sumar ml-1" name="prod_add">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                            <form method="post">
                                <input type="hidden" name="prod_id" value="{$fila['cart_prod_id']}">
                                <button type="submit" class="main__contenedor__table__body__fila--name--delete ml-1" name="prod_remove">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
DELIMITER;
                echo $producto;
            }
            return $total;
        }
    }

    function post_prodRemove(){
        if(isset($_POST['prod_remove'])){
            $prod_id = clean_string(trim($_POST['prod_id']));
            $user_id = $_SESSION['user_id'];
            $query = query("SELECT * FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE cart_prod_id = {$prod_id} AND cart_user_id = {$user_id}");
            if(contar_filas($query) != 1){
                set_mensaje(display_msj("Estas incurriendo a malas practicas", "error"));
                redirect("carrito.php?user={$user_id}");
            } else {
                $query = query("DELETE FROM carrito WHERE cart_prod_id = {$prod_id} AND cart_user_id = {$user_id}");
                redirect("carrito.php?user={$user_id}");
            }
        }
    }
    
    function post_productoAdd(){
        if(isset($_POST['prod_add'])){
            $prod_id = clean_string(trim($_POST['prod_id']));
            $user_id = $_SESSION['user_id'];
            $query = query("SELECT * FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE cart_prod_id = {$prod_id} AND cart_user_id = {$user_id}");
            if(contar_filas($query) != 1){
                set_mensaje(display_msj("Estas incurriendo a malas practicas", "error"));
                redirect("carrito.php?user={$user_id}");
            } else {
                $fila = fetch_assoc($query);
                $prod_canti = $fila['prod_canti'];
                $cart_canti = $fila['cart_canti'];
                if($cart_canti >= $prod_canti){
                    set_mensaje(display_msj("No tenemos mas cantidad en el almacen", "error"));
                    redirect("carrito.php?user={$user_id}");
                } else {
                    $query = query("UPDATE carrito SET cart_canti = cart_canti + 1 WHERE cart_prod_id = {$prod_id} AND cart_user_id = {$user_id}");
                    redirect("carrito.php?user={$user_id}");
                }
            }
        }
    }

    function post_prodDisminur(){
        if(isset($_POST['prod_restar'])){
            $prod_id = clean_string(trim($_POST['prod_id']));
            $user_id = $_SESSION['user_id'];
            $query = query("SELECT * FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE cart_prod_id = {$prod_id} AND cart_user_id = {$user_id}");
            if(contar_filas($query) != 1){
                set_mensaje(display_msj("Estas incurriendo a malas practicas", "error"));
                redirect("carrito.php?user={$user_id}");
            } else {
                $fila = fetch_assoc($query);
                $cart_canti = $fila['cart_canti'];
                if($cart_canti <= 1){
                    set_mensaje(display_msj("No pudes poner una cantidad menor a 1", "error"));
                    redirect("carrito.php?user={$user_id}");
                } else {
                    $query = query("UPDATE carrito SET cart_canti = cart_canti - 1 WHERE cart_prod_id = {$prod_id} AND cart_user_id = {$user_id}");
                    redirect("carrito.php?user={$user_id}");
                }
            }
        }
    }
?>