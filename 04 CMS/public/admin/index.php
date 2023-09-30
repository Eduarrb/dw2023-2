<?php require_once("../../resources/config.php"); ?>
<?php include VIEW_BACK . DS . "head.php"; ?>

<section class="admin">
    <?php include VIEW_BACK . DS . "menu.php"; ?>
    <?php
        // echo $_SERVER['REQUEST_URI'];
        if($_SERVER['REQUEST_URI'] == '/dw2023-2/04%20CMS/public/admin/' || $_SERVER['REQUEST_URI'] == '/dw2023-2/04%20CMS/public/admin/index.php'){
            validarAdmin();
            include VIEW_BACK . DS . "bienvenida.php";
        }
        if(isset($_GET['productos'])){
            validarAdmin();
            include VIEW_BACK . DS . "productos.php";
        }
        if(isset($_GET['productos_add'])){
            validarAdmin();
            include VIEW_BACK . DS . "productos_add.php";
        }
        if(isset($_GET['productos_edit'])){
            validarAdmin();
            include VIEW_BACK . DS . "productos_edit.php";
        }
        if(isset($_GET['productos_delete'])){
            validarAdmin();
            include VIEW_BACK . DS . "productos_delete.php";
        }
    ?>
</section>
<?php include VIEW_BACK . DS . "footer.php"; ?>