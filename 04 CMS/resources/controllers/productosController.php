<?php
    // ⚡⚡ BACK
    function get_productos(){
        $query = query("SELECT * FROM productos");
        while($fila = fetch_assoc($query)){
            $producto = <<<DELIMITER
                <div class="admin__data__box__body__fila">
                    <div class="admin__data__box__body__fila--name data-id">
                        {$fila['prod_id']}
                    </div>
                    <div class="admin__data__box__body__fila--name data-nombre">
                        {$fila['prod_nombre']}
                    </div>
                    <div class="admin__data__box__body__fila--name data-desc">
                        {$fila['prod_descri']}
                    </div>
                    <div class="admin__data__box__body__fila--name data-img">
                        <img src="../img/productos/{$fila['prod_img']}" alt="{$fila['prod_nombre']}">
                    </div>
                    <div class="admin__data__box__body__fila--name data-precio">
                        S/. {$fila['prod_precio']}
                    </div>
                    <div class="admin__data__box__body__fila--name data-canti">
                        {$fila['prod_canti']}
                    </div>
                    <div class="admin__data__box__body__fila--name data-ac">
                        <a href="index.php?productos_edit&id={$fila['prod_id']}" class="admin__data__box__body__fila--name--editar">editar</a>
                        <a href="index.php?productos_delete&id={$fila['prod_id']}" class="admin__data__box__body__fila--name--borrar ml-1">borrar</a>
                    </div>
                </div>
DELIMITER;
            echo $producto;
        }
    }

    function post_agregarProductos(){
        $errores = [];
        $min = 5;
        if(isset($_POST['guardar'])){
            $prod_nombre = clean_string(trim($_POST['prod_nombre']));
            $prod_descri = clean_string(trim($_POST['prod_descri']));
            $prod_precio = clean_string(trim($_POST['prod_precio']));
            $prod_canti = clean_string(trim($_POST['prod_canti']));
            $prod_img = $_FILES['prod_img']['name'];
            $prod_img_tmp = $_FILES['prod_img']['tmp_name'];
            
            if(strlen($prod_nombre) < $min){
                $errores["nombre"] = "El campo nombre debe tener mas de {$min} caracteres";
            }
            if(strlen($prod_descri) < $min){
                $errores["descri"] = "El campo descripción debe tener mas de {$min} caracteres";
            }
            if($prod_precio <= 0){
                $errores["precio"] = "El precio debe ser mayor que 0";
            }
            if($prod_canti <= 0){
                $errores["canti"] = "La cantidad debe ser mayor que 0";
            }
            if(!empty($errores)){
                return $errores;
            }

            $prod_img_nueva = md5(uniqid()) . "." . explode(".", $prod_img)[1];

            move_uploaded_file($prod_img_tmp, "../img/productos/{$prod_img_nueva}");
            query("INSERT INTO productos (prod_nombre, prod_descri, prod_precio, prod_canti, prod_img) VALUES ('{$prod_nombre}', '{$prod_descri}', {$prod_precio}, {$prod_canti}, '{$prod_img_nueva}')");
            set_mensaje(display_msj("Producto agregado correctamente", "mensaje"));
            redirect("index.php?productos");
        }
    }

    function get_productoEdit(){
        if(isset($_GET['id'])){
            $id = clean_string(trim($_GET['id']));
            $producto = query("SELECT * FROM productos WHERE prod_id = {$id}");
            if(contar_filas($producto) == 0){
                redirect("index.php?productos");
            }
            return fetch_assoc($producto);
        } else {
            redirect("index.php?productos");
        }
    }

    function post_productoEdit($id, $imgAnterior){
        if(isset($_POST['editar'])){
            $prod_nombre = clean_string(trim($_POST['prod_nombre']));
            $prod_descri = clean_string(trim($_POST['prod_descri']));
            $prod_precio = clean_string(trim($_POST['prod_precio']));
            $prod_canti = clean_string(trim($_POST['prod_canti']));
            $prod_img = $_FILES['prod_img']['name'];
            $prod_img_tmp = $_FILES['prod_img']['tmp_name'];

            if(!empty($prod_img)){
                $prod_img_nueva = md5(uniqid()) . "." . explode(".", $prod_img)[1];
                move_uploaded_file($prod_img_tmp, "../img/productos/{$prod_img_nueva}");
                $imagenAnteriorLocation = "../img/productos/{$imgAnterior}";
                unlink($imagenAnteriorLocation);
            } else {
                $prod_img_nueva = $imgAnterior;
            }

            $query = query("UPDATE productos SET prod_nombre = '{$prod_nombre}', prod_descri = '{$prod_descri}', prod_precio = {$prod_precio}, prod_canti = {$prod_canti}, prod_img = '{$prod_img_nueva}' WHERE prod_id = {$id}");
            set_mensaje(display_msj("Producto actualizado correctamente", "mensaje"));
            redirect("index.php?productos");
        }
    }

    function post_delete(){
        if(isset($_GET['id'])){
            $id = clean_string(trim($_GET['id']));
            if(existeItem('productos', 'prod_id', $id)){
                $query = query("DELETE FROM productos WHERE prod_id = {$id}");
                set_mensaje(display_msj("Producto eliminado correctamente", "mensaje"));
                redirect("index.php?productos");
            } else {
                set_mensaje(display_msj("El producto seleccionado no exite", "error"));
                redirect("index.php?productos");
            }
        }
    }

    // ⚡⚡ FRONT
    function get_productosFront(){
        $query = query("SELECT * FROM productos");
        while($fila = fetch_assoc($query)){
            $producto = <<<DELIMITER
                <a href="producto.php?id={$fila['prod_id']}" class="productos__box__item">
                    <img src="img/productos/{$fila['prod_img']}" alt="{$fila['prod_nombre']}">
                    <p>{$fila['prod_nombre']}</p>
                    <div class="productos__box__item__precio">
                        <span class="productos__box__item__precio--oferta">S/ {$fila['prod_precio']}</span>
                    </div>
                </a>
DELIMITER;
            echo $producto;
        }
    }

    function get_productoFront(){
        if(isset($_GET['id'])){
            $id = clean_string(trim($_GET['id']));
            $query = query("SELECT * FROM productos WHERE prod_id = {$id}");
            if(contar_filas($query) == 1){
                return fetch_assoc($query);
            } else {
                redirect("./");
            }
        }
    }

    function post_addCarrito(){
        if(isset($_POST['addCarrito'])){
            echo 'funciona';
        }
    }
?>