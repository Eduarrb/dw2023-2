<?php
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
                        <a href="#" class="admin__data__box__body__fila--name--borrar ml-1">borrar</a>
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

?>