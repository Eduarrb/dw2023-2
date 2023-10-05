<?php require_once("../resources/config.php"); ?>
<?php include VIEW_FRONT . DS . "head.php"; ?>

    <?php include VIEW_FRONT . DS . "top.php"; ?>
    <?php include VIEW_FRONT . DS . "nav.php"; ?>

        <main class="main marginMain">
            <div class="main__contenedor contenedor">
                <div class="main__contenedor__table">
                    
                    <div class="main__contenedor__table__header">
                        <div class="main__contenedor__table__header--name data-nombre">
                            NOMBRE
                        </div>
                        <div class="main__contenedor__table__header--name data-desc">
                            DESCRIPCIÓN
                        </div>
                        <div class="main__contenedor__table__header--name data-img">
                            IMAGEN
                        </div>
                        <div class="main__contenedor__table__header--name data-precio">
                            PRECIO
                        </div>
                        <div class="main__contenedor__table__header--name data-canti">
                            CANTIDAD
                        </div>
                        <div class="main__contenedor__table__header--name data-canti">
                            SUBTOTAL
                        </div>
                        <div class="main__contenedor__table__header--name data-ac">
                            ACCIONES
                        </div>
                    </div>
                    <div class="main__contenedor__table__body">
                        <?php $total = get_carrito(); ?>
                        <!-- <p>No tiene productos seleccionados</p> -->
                    </div>
                    <div class="main__contenedor__table__totalBox">
                        <span class="main__contenedor__table__totalBox--total"
                            >Total</span
                        >
                        <span class="main__contenedor__table__totalBox--pagar"
                            >S/. <?php echo $total; ?></span
                        >
                    </div>
                    <form action="#" class="main__contenedor__table__checkout">
                        <input type="submit" value="Checkout" />
                    </form>
                </div>
            </div>
        </main>
    <?php include VIEW_FRONT . DS . "footer.php"; ?>
       