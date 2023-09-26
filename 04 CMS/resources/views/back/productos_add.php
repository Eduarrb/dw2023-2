<div class="admin__data">
    <h1 class="titulo-n2 text-center mb-5">Formulario Productos</h1>
    <p style="font-size: 2rem;">
        <?php
            mostrar_msj();
            $errores = post_agregarProductos();
        ?>
    </p>
    <form class="admin__data__form mt-4" method="post" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <input type="text" placeholder="Nombre" name="prod_nombre">
            <div class="admin__data__form--error">
                <?php echo !empty($errores['nombre']) ? $errores['nombre'] : ""; ?>
            </div>
        </div>
        <div class="form-group mb-2">
            <textarea name="prod_descri" id="" cols="30" rows="5" placeholder="Descripción"></textarea>
            <div class="admin__data__form--error">
                <?php echo !empty($errores['descri']) ? $errores['descri'] : ""; ?>
            </div>
        </div>
        <div class="form-group mb-2">
            <input type="number" placeholder="Precio" name="prod_precio" step="any">
            <div class="admin__data__form--error">
                <?php echo !empty($errores['precio']) ? $errores['precio'] : ""; ?>
            </div>
        </div>
        <div class="form-group mb-2">
            <input type="number" placeholder="Cantidad" name="prod_canti"">
            <div class="admin__data__form--error">
                <?php echo !empty($errores['canti']) ? $errores['canti'] : ""; ?>
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