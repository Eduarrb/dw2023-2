<div class="top">
    <div class="top__contenedor contenedor">
        <p class="top__contenedor--welcome">
            Welcome to Kompi, One Stop Shop For All Your Gaming Needs!
        </p>
        <div class="top__contenedor__menu">
            <div class="top__contenedor__menu__item">
                <a href="" class="top__contenedor__menu__item--link">
                    <i class="fa-solid fa-truck"></i>Track order
                </a>
            </div>
            <div class="top__contenedor__menu__item">
                <select class="top__contenedor__menu__item__select">
                    <option value="">English</option>
                    <option value="">Spanish</option>
                </select>
                <!-- <i class="fa-solid fa-angle-down"></i> -->
            </div>
            <div class="top__contenedor__menu__item">
                <i class="fa-solid fa-user"></i>
                <?php
                    if(!isset($_SESSION['user_names'])){
                        ?>
                            <a href="login.php" class="top__contenedor__menu__item--link">
                                Sing In                        
                            </a>
                            <span>/</span>
                            <a href="register.php" class="top__contenedor__menu__item--link"> 
                                Register
                            </a>
                    <?php } else {
                        ?>
                            <a href="logout.php" class="top__contenedor__menu__item--link">
                                Cerrar Sesión                       
                            </a>
                    <?php }
                ?>
            </div>
        </div>
    </div>
</div>