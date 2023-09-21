<?php require_once("../resources/config.php"); ?>
<?php include VIEW_FRONT . DS . "head.php"; ?>
    <section class="auth">
        <div class="auth__data">
            <img src="img/logo-kompi-dark.png" alt="" class="auth__data__logo mb-10">
            <h1 class="titulo-n2 text-center mb-5">Costumer Login</h1>
            <p class="descri text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget ultricies nibh mattis tortor egestas dis at ipsum.</p>
            <?php mostrar_msj(); ?>
            <?php validar_user_login(); ?>
            <form class="auth__data__form mt-4" method="post">
                <div class="form-group mb-2">
                    <input type="text" placeholder="Email" name="user_email">
                </div>
                <div class="form-group mb-5">
                    <input type="password" placeholder="Password" name="user_pass">
                </div>
                <div class="form-group">
                    <input type="submit" value="Log In" class="btnFullWidth color-blanco" name="login">
                </div>
            </form>
        </div>
        <div class="auth__loginImgBox"></div>
    </section>
</body>
</html>