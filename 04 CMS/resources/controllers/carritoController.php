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
        } else {
            $user_id = $_SESSION['user_id'];
            $query = query("SELECT * FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE cart_user_id = {$user_id}");
            while($fila = fetch_assoc($query)){
                $producto = <<<DELIMITER
                    <div class="main__contenedor__table__body__fila">
                        <div class="main__contenedor__table__body__fila--name data-nombre">
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-desc">
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-img">
                            <img src="/uploads/productos/" alt="" />
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-precio">
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-canti">
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-canti">
                        </div>
                        <div class="main__contenedor__table__body__fila--name data-ac">
                            <form action="/cart/restar/" method="post">
                                <button type="submit" class="main__contenedor__table__body__fila--name--restar">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </form>
                            <form action="/cart/sumar/" method="post">
                                <button type="submit" class="main__contenedor__table__body__fila--name--sumar ml-1">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                            <form action="/cart/delete/" method="post">
                                <button type="submit" class="main__contenedor__table__body__fila--name--delete ml-1">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
DELIMITER;
                echo $producto;
            }
        }
    }
    

?>