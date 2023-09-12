<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Rajdhani:wght@300;400;600;700&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <title>Kompi</title>
        <link rel="stylesheet" href="css/estilos.css" />
    </head>
    <body>
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
                        <a
                            href="login.html"
                            class="top__contenedor__menu__item--link"
                        >
                            Sing In
                        </a>
                        <span>/</span>
                        <a href="" class="top__contenedor__menu__item--link">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="nav">
            <div class="nav__top pt-1 pb-1">
                <div class="nav__top__contenedor contenedor">
                    <div class="nav__top__contenedor__menuLeft">
                        <img src="img/logo-kompi-dark.png" alt="Logo Kompi" />
                        <ul class="nav__top__contenedor__menuLeft__menu">
                            <!-- li.nav__top__contenedor__menuLeft__menu__item*5>a.nav__top__contenedor__menuLeft__menu__item--link -->
                            <li
                                class="nav__top__contenedor__menuLeft__menu__item"
                            >
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuLeft__menu__item--link"
                                >
                                    Home
                                </a>
                            </li>
                            <li
                                class="nav__top__contenedor__menuLeft__menu__item"
                            >
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuLeft__menu__item--link"
                                >
                                    About
                                </a>
                            </li>
                            <li
                                class="nav__top__contenedor__menuLeft__menu__item"
                            >
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuLeft__menu__item--link"
                                >
                                    Shop <i class="fa-solid fa-angle-down"></i>
                                </a>
                            </li>
                            <li
                                class="nav__top__contenedor__menuLeft__menu__item"
                            >
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuLeft__menu__item--link"
                                >
                                    Pages <i class="fa-solid fa-angle-down"></i>
                                </a>
                            </li>
                            <li
                                class="nav__top__contenedor__menuLeft__menu__item"
                            >
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuLeft__menu__item--link"
                                >
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav__top__contenedor__menuCenter">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="nav__top__contenedor__menuRight">
                        <ul class="nav__top__contenedor__menuRight__menu">
                            <li
                                class="nav__top__contenedor__menuRight__menu__item mr-3"
                            >
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuRight__menu__item--link"
                                >
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </li>
                            <li
                                class="nav__top__contenedor__menuRight__menu__item mr-2"
                            >
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuRight__menu__item--link"
                                >
                                    <i class="fa-solid fa-dollar-sign"></i>0
                                </a>
                                <a
                                    href="#"
                                    class="nav__top__contenedor__menuRight__menu__item--link"
                                >
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <span>0</span>
                                </a>
                            </li>
                            <li
                                class="nav__top__contenedor__menuRight__menu__item"
                            >
                                <i
                                    class="nav__top__contenedor__menuRight__menu__item--icon fa-solid fa-headset"
                                ></i>
                                <div
                                    class="nav__top__contenedor__menuRight__menu__item__data"
                                >
                                    <div>(+021) 345 678 910</div>
                                    <div>Email: info@kompi.com</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav__bottom">
                <div class="nav__bottom__contenedor contenedor">
                    <ul class="nav__bottom__contenedor__menu">
                        <!-- li.nav__bottom__contenedor__menu__item*6>a.nav__bottom__contenedor__menu__item--link -->
                        <li class="nav__bottom__contenedor__menu__item">
                            <a
                                href="#"
                                class="nav__bottom__contenedor__menu__item--link"
                                >Best Deals</a
                            >
                        </li>
                        <li class="nav__bottom__contenedor__menu__item">
                            <a
                                href="#"
                                class="nav__bottom__contenedor__menu__item--link"
                                >Best Seller</a
                            >
                        </li>
                        <li class="nav__bottom__contenedor__menu__item">
                            <a
                                href="#"
                                class="nav__bottom__contenedor__menu__item--link"
                                >Gaming PC</a
                            >
                        </li>
                        <li class="nav__bottom__contenedor__menu__item">
                            <a
                                href="#"
                                class="nav__bottom__contenedor__menu__item--link"
                                >Gaming Peripheral</a
                            >
                        </li>
                        <li class="nav__bottom__contenedor__menu__item">
                            <a
                                href="#"
                                class="nav__bottom__contenedor__menu__item--link"
                                >System Builder</a
                            >
                        </li>
                        <li class="nav__bottom__contenedor__menu__item">
                            <a
                                href="#"
                                class="nav__bottom__contenedor__menu__item--link"
                                >Cables & Adapters</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="main marginMain">
            <div class="main__contenedor contenedor">
                <section class="producto pt-5 pb-5">
                    <div class="producto__detalle">
                        <div class="producto__detalle__img">
                            <img src="img/product-1-300x300.jpg" alt="">
                        </div>
                        <div class="producto__detalle__data">
                            <h2 class="tituloPro">IPASON – Gaming Desktop – AMD 3000G</h2>
                            <div class="producto__detalle__data__precio">
                                <span class="producto__detalle__data__precio__before">$40</span>
                                <span class="producto__detalle__data__precio__oferta">$23</span>
                            </div>
                            <p class="descri">Velit, condimentum nibh facilisi diam volutpat ullamcorper. Faucibus in dignissim nunc, eget molestie id amet vitae congue nulla. Aenean nec erat sed sociis sed neque. Sem ante leo Facilisis morbi</p>
                            <form class="producto__detalle__data__form">
                                <div class="producto__detalle__data__form__canti">
                                    <input type="number" value="1">
                                </div>
                                <div class="producto__detalle__data__form__btn">
                                    <input type="submit" value="Add to cart">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <script src="js/app.js"></script>
    </body>
</html>
