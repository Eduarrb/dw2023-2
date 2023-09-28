<div class="admin__data">
    <h1 class="titulo-n2 text-center mb-5">Formulario Productos</h1>
    <p style="font-size: 2rem;">
        <?php
            mostrar_msj();
            $fila = get_productoEdit();
        ?>
    </p>
    <form class="admin__data__form mt-4" method="post" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <input 
                type="text" 
                placeholder="Nombre" 
                name="prod_nombre"
                value="<?php echo $fila['prod_nombre']; ?>"
            >
            <div class="admin__data__form--error">
               
            </div>
        </div>
        <div class="form-group mb-2">
            <textarea name="prod_descri" id="" cols="30" rows="5" placeholder="Descripción"><?php echo $fila['prod_descri']; ?></textarea>
            <div class="admin__data__form--error">
                
            </div>
        </div>
        <div class="form-group mb-2">
            <input 
                type="number" 
                placeholder="Precio" 
                name="prod_precio" 
                step="any"
                value="<?php echo $fila['prod_precio']; ?>"
            >
            <div class="admin__data__form--error">
                
            </div>
        </div>
        <div class="form-group mb-2">
            <input 
                type="number" 
                placeholder="Cantidad" 
                name="prod_canti"
                value="<?php echo $fila['prod_canti']; ?>"
            >
            <div class="admin__data__form--error">
                
            </div>
        </div>
        <div class="form-group mb-2">
            <img 
                src="../img/productos/<?php echo $fila['prod_img'] ?>"
                alt="<?php echo $fila['prod_nombre'] ?>" 
                width="150"
            >
            <br>
            <input 
                type="file" 
                name="prod_img" 
                class="mt-1"
            >
            <div class="admin__data__form--error">
            </div>
        </div>
        <div class="form-group mt-5">
            <input type="submit" value="Guardar" class="btnFullWidth color-blanco" name="guardar">
        </div>
    </form>
    
</div>