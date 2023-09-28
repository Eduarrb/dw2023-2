<div class="admin__data">
    <h1 class="titulo-n2 text-center mb-5">Todos Los productos</h1>
    <?php mostrar_msj(); ?>
    <a href="index.php?productos_add" class="btn btnBG-naranja color-blanco mb-5">Crear Producto</a>
    
    <div class="admin__data__box">
        <div class="admin__data__box__header">
            <div class="admin__data__box__header--name data-id">
                ID
            </div>
            <div class="admin__data__box__header--name data-nombre">
                NOMBRE
            </div>
            <div class="admin__data__box__header--name data-desc">
                DESCRIPCIÓN
            </div>
            <div class="admin__data__box__header--name data-img">
                IMAGEN
            </div>
            <div class="admin__data__box__header--name data-precio">
                PRECIO
            </div>
            <div class="admin__data__box__header--name data-canti">
                CANTIDAD
            </div>
            <div class="admin__data__box__header--name data-ac">
                ACCIONES
            </div>
        </div>
        <div class="admin__data__box__body">
            <?php get_productos(); ?>
        </div>
    </div>
</div>