<?php require_once("../resources/config.php"); ?>
<?php include VIEW_FRONT . DS . "head.php"; ?>

    <?php include VIEW_FRONT . DS . "top.php"; ?>
    <?php include VIEW_FRONT . DS . "nav.php"; ?>

        <main class="main marginMain">
            <div class="main__contenedor contenedor">
                <section class="producto pt-5 pb-5">
                    <?php 
                        mostrar_msj();
                        $fila = get_productoFront(); 
                    ?>
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
                            <?php post_addCarrito($fila['prod_canti']); ?>
                            <form class="producto__detalle__data__form" method="post">
                                <div class="producto__detalle__data__form__canti">
                                    <input type="number" value="1" name="prod_canti" max="<?php echo $fila['prod_canti']; ?>">
                                </div>
                                <div class="producto__detalle__data__form__btn">
                                    <input type="submit" value="Add to cart" name="addCarrito">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <section class="productos pb-5">
                    <h6 class="cajita">featured</h6>
                    <div class="productos__headingBox">
                        <div class="productos__headingBox__col">
                            <h2 class="titulo-n2 mr-4">Comentarios</h2>
                            <p class="descri">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="productos__formBox mt-5">
                        <form class="productos__formBox__form mt-4" method="post">
                            <div class="form-group mb-2">
                                <textarea name="" id="" cols="30" rows="5" placeholder="Comentario"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <select name="" id="">
                                    <option value="" selected disabled>-Deja tu valoracion-</option>
                                    <option value="">1 estrella</option>
                                    <option value="">2 estrellas</option>
                                    <option value="">3 estrellas</option>
                                    <option value="">4 estrellas</option>
                                    <option value="">5 estrellas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Enviar Comentario" class="btnFullWidth-blue color-blanco" name="login">
                            </div>
                        </form>
                    </div>
                    <div class="productos__comentariosBox">
                        <article class="productos__comentariosBox__item">
                            <div class="productos__comentariosBox__item__imgBox">
                                <img src="img/testimoni6.jpg" alt="">
                            </div>
                            <div class="productos__comentariosBox__item__data">
                                <div class="productos__comentariosBox__item__data__top">
                                    <span class="productos__comentariosBox__item__data__top--nombre">
                                        Eduardo Arroyo
                                    </span>
                                    <span class="productos__comentariosBox__item__data__top--fecha">
                                        2 de setiembre del 2023
                                    </span>
                                </div>
                                <div class="productos__comentariosBox__item__data__bottom">
                                    <p class="productos__comentariosBox__item__data__bottom__coment">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, architecto! Ducimus velit ab blanditiis temporibus officia quas quae et nostrum quibusdam cumque. Praesentium, eos.
                                    </p>
                                    <div class="productos__comentariosBox__item__data__bottom__stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="productos__comentariosBox__item">
                            <div class="productos__comentariosBox__item__imgBox">
                                <img src="img/testimoni6.jpg" alt="">
                            </div>
                            <div class="productos__comentariosBox__item__data">
                                <div class="productos__comentariosBox__item__data__top">
                                    <span class="productos__comentariosBox__item__data__top--nombre">
                                        Eduardo Arroyo
                                    </span>
                                    <span class="productos__comentariosBox__item__data__top--fecha">
                                        2 de setiembre del 2023
                                    </span>
                                </div>
                                <div class="productos__comentariosBox__item__data__bottom">
                                    <p class="productos__comentariosBox__item__data__bottom__coment">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, architecto! Ducimus velit ab blanditiis temporibus officia quas quae et nostrum quibusdam cumque. Praesentium, eos.
                                    </p>
                                    <div class="productos__comentariosBox__item__data__bottom__stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="productos__comentariosBox__item">
                            <div class="productos__comentariosBox__item__imgBox">
                                <img src="img/testimoni6.jpg" alt="">
                            </div>
                            <div class="productos__comentariosBox__item__data">
                                <div class="productos__comentariosBox__item__data__top">
                                    <span class="productos__comentariosBox__item__data__top--nombre">
                                        Eduardo Arroyo
                                    </span>
                                    <span class="productos__comentariosBox__item__data__top--fecha">
                                        2 de setiembre del 2023
                                    </span>
                                </div>
                                <div class="productos__comentariosBox__item__data__bottom">
                                    <p class="productos__comentariosBox__item__data__bottom__coment">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, architecto! Ducimus velit ab blanditiis temporibus officia quas quae et nostrum quibusdam cumque. Praesentium, eos.
                                    </p>
                                    <div class="productos__comentariosBox__item__data__bottom__stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="productos__comentariosBox__item">
                            <div class="productos__comentariosBox__item__imgBox">
                                <img src="img/testimoni6.jpg" alt="">
                            </div>
                            <div class="productos__comentariosBox__item__data">
                                <div class="productos__comentariosBox__item__data__top">
                                    <span class="productos__comentariosBox__item__data__top--nombre">
                                        Eduardo Arroyo
                                    </span>
                                    <span class="productos__comentariosBox__item__data__top--fecha">
                                        2 de setiembre del 2023
                                    </span>
                                </div>
                                <div class="productos__comentariosBox__item__data__bottom">
                                    <p class="productos__comentariosBox__item__data__bottom__coment">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, architecto! Ducimus velit ab blanditiis temporibus officia quas quae et nostrum quibusdam cumque. Praesentium, eos.
                                    </p>
                                    <div class="productos__comentariosBox__item__data__bottom__stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="productos__comentariosBox__item">
                            <div class="productos__comentariosBox__item__imgBox">
                                <img src="img/testimoni6.jpg" alt="">
                            </div>
                            <div class="productos__comentariosBox__item__data">
                                <div class="productos__comentariosBox__item__data__top">
                                    <span class="productos__comentariosBox__item__data__top--nombre">
                                        Eduardo Arroyo
                                    </span>
                                    <span class="productos__comentariosBox__item__data__top--fecha">
                                        2 de setiembre del 2023
                                    </span>
                                </div>
                                <div class="productos__comentariosBox__item__data__bottom">
                                    <p class="productos__comentariosBox__item__data__bottom__coment">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, architecto! Ducimus velit ab blanditiis temporibus officia quas quae et nostrum quibusdam cumque. Praesentium, eos.
                                    </p>
                                    <div class="productos__comentariosBox__item__data__bottom__stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </main>
    <?php include VIEW_FRONT . DS . "footer.php"; ?>
       