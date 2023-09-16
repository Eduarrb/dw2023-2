<?php require_once("../resources/config.php"); ?>
<?php include VIEW_FRONT . DS . "head.php"; ?>

    <?php include VIEW_FRONT . DS . "top.php"; ?>
    <?php include VIEW_FRONT . DS . "nav.php"; ?>
    <?php include VIEW_FRONT . DS . "portada.php"; ?>

    <main class="main">
        <div class="main__contenedor contenedor">
            <?php
                $_SESSION['nombre'] = "Eduardo";
                echo $_SESSION['nombre'];
            ?>
            <?php include VIEW_FRONT . DS . "novedades.php"; ?>
            <?php include VIEW_FRONT . DS . "productos.php"; ?>
        </div>
    </main>

    <?php include VIEW_FRONT . DS . "testimonios.php"; ?>
    <?php include VIEW_FRONT . DS . "footer.php"; ?>