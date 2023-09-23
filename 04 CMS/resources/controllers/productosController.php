<?php
    function post_agregarProductos(){
        $errores = [];
        $min = 5;
        if(isset($_POST['guardar'])){
            $prod_nombre = clean_string(trim($_POST['prod_nombre']));
            $prod_descri = clean_string(trim($_POST['prod_descri']));
            $prod_precio = clean_string(trim($_POST['prod_precio']));
            $prod_canti = clean_string(trim($_POST['prod_canti']));
            
            if(strlen($prod_nombre) < $min){
                $errores["nombre"] = "El campo nombre debe tener mas de {$min} caracteres";
            }
            if(strlen($prod_descri) < $min){
                $errores["descri"] = "El campo descripción debe tener mas de {$min} caracteres";
            }
            if(!empty($errores)){
                return $errores;
            }

            query("INSERT INTO productos (prod_nombre, prod_descri, prod_precio, prod_canti) VALUES ('{$prod_nombre}', '{$prod_descri}', {$prod_precio}, {$prod_canti})");

            redirect("index.php?productos");

        }
    }

?>