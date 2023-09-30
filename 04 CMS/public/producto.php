<?php require_once("../resources/config.php"); ?>
<?php include VIEW_FRONT . DS . "head.php"; ?>

    <?php include VIEW_FRONT . DS . "top.php"; ?>
    <?php include VIEW_FRONT . DS . "nav.php"; ?>

        <main class="main marginMain">
            <div class="main__contenedor contenedor">
                <section class="producto pt-5 pb-5">
                    <?php $fila = get_productoFront(); ?>
                    <div class="producto__detalle">
                        <div class="producto__detalle__img">
                            <img src="img/productos/<?php echo $fila['prod_img']; ?>" alt="<?php echo $fila['prod_nombre']; ?>">
                        </div>
                        <div class="producto__detalle__data">
                            <h2 class="tituloPro"><?php echo $fila['prod_nombre']; ?></h2>
                            <div class="producto__detalle__data__precio">
                                <span class="producto__detalle__data__precio__oferta">
                                    S/ <?php echo $fila['prod_precio']; ?>
                                </span>
                            </div>
                            <p class="descri">
                                <?php echo $fila['prod_descri']; ?>
                            </p>
                            <?php post_addCarrito(); ?>
                            <form class="producto__detalle__data__form" method="post">
                                <div class="producto__detalle__data__form__canti">
                                    <input type="number" value="1" name="prod_canti">
                                </div>
                                <div class="producto__detalle__data__form__btn">
                                    <input type="submit" value="Add to cart" name="addCarrito">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    <?php include VIEW_FRONT . DS . "footer.php"; ?>
       