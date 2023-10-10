<?php require_once("../resources/config.php"); ?>
<?php include VIEW_FRONT . DS . "head.php"; ?>

    <?php include VIEW_FRONT . DS . "top.php"; ?>
    <?php include VIEW_FRONT . DS . "nav.php"; ?>

        <main class="main marginMain">
            <div class="main__contenedor contenedor">
                <div class="main__contenedor__table">
                    <?php mostrar_msj(); ?>
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
                        <?php 
                            $data = get_carrito();
                            post_productoAdd(); 
                            post_prodDisminur();
                            post_prodRemove();
                        ?>
                        <!-- <p>No tiene productos seleccionados</p> -->
                    </div>
                    <div class="main__contenedor__table__totalBox">
                        <span class="main__contenedor__table__totalBox--total"
                            >Total</span
                        >
                        <span class="main__contenedor__table__totalBox--pagar"
                            >S/. <?php echo $data[0]; ?></span
                        >
                    </div>
                    <form action="#" class="main__contenedor__table__checkout">
                        <input type="submit" value="Checkout" />
                    </form>
                    <div id="wallet_container"></div>
                </div>
            </div>
        </main>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            const mp = new MercadoPago('YOUR_PUBLIC_KEY');
            const bricksBuilder = mp.bricks();
            mp.bricks().create("wallet", "wallet_container", {
                initialization: {
                    preferenceId: "<?php echo $data[1]; ?>",
                    redirectMode: "modal"                
                },
            });
        </script>
    <?php include VIEW_FRONT . DS . "footer.php"; ?>
       