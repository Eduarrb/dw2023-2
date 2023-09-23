<div class="admin__data">
    <h1 class="titulo-n2 text-center mb-5">Formulario Productos</h1>
    <?php 
        $errores = post_agregarProductos();
    ?>
    <form class="admin__data__form mt-4" method="post">
        <div class="form-group mb-2">
            <input type="text" placeholder="Nombre" name="prod_nombre">
            <div class="admin__data__form--error">
                <?php 
                    if(!empty($errores)){
                        echo $errores["nombre"];
                    } 
                ?>
            </div>
        </div>
        <div class="form-group mb-2">
            <textarea name="prod_descri" id="" cols="30" rows="5" placeholder="Descripción"></textarea>
            <div class="admin__data__form--error">
                <?php 
                    if(!empty($errores)){
                        echo $errores["nombre"];
                    } 
                ?>
            </div>
        </div>
        <div class="form-group mb-2">
            <input type="text" placeholder="Precio" name="prod_precio">
            <div class="admin__data__form--error">
            </div>
        </div>
        <div class="form-group mb-2">
            <input type="text" placeholder="Cantidad" name="prod_canti">
            <div class="admin__data__form--error">
            </div>
        </div>
        <div class="form-group mb-2">
            <input type="file" name="prod_img">
            <div class="admin__data__form--error">
            </div>
        </div>
        <div class="form-group mt-5">
            <input type="submit" value="Guardar" class="btnFullWidth color-blanco" name="guardar">
        </div>
    </form>
    
</div>