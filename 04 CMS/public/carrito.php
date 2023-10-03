<?php require_once("../resources/config.php"); ?>
<?php include VIEW_FRONT . DS . "head.php"; ?>

    <?php include VIEW_FRONT . DS . "top.php"; ?>
    <?php include VIEW_FRONT . DS . "nav.php"; ?>

        <main class="main marginMain">
            <div class="main__contenedor contenedor">
                <div class="main__contenedor__table">
                    <?php get_carrito(); ?>
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
                        <div class="main__contenedor__table__body__fila">
                            <div
                                class="main__contenedor__table__body__fila--name data-nombre"
                            >
                            </div>
                            <div
                                class="main__contenedor__table__body__fila--name data-desc"
                            >
                            </div>
                            <div
                                class="main__contenedor__table__body__fila--name data-img"
                            >
                                <img
                                    src="/uploads/productos/"
                                    alt=""
                                />
                            </div>
                            <div
                                class="main__contenedor__table__body__fila--name data-precio"
                            >
                            </div>
                            <div
                                class="main__contenedor__table__body__fila--name data-canti"
                            >
                            </div>
                            <div
                                class="main__contenedor__table__body__fila--name data-canti"
                            >
                            </div>
                            <div
                                class="main__contenedor__table__body__fila--name data-ac"
                            >
                                <form
                                    action="/cart/restar/"
                                    method="post"
                                >
                                    <input
                                        type="hidden"
                                        name="_csrf"
                                        value=""
                                    />
                                    <button
                                        type="submit"
                                        class="main__contenedor__table__body__fila--name--restar"
                                    >
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </form>
                                <form
                                    action="/cart/sumar/"
                                    method="post"
                                >
                                    <input
                                        type="hidden"
                                        name="_csrf"
                                        value=""
                                    />
                                    <button
                                        type="submit"
                                        class="main__contenedor__table__body__fila--name--sumar ml-1"
                                    >
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </form>
                                <form
                                    action="/cart/delete/"
                                    method="post"
                                >
                                    <input
                                        type="hidden"
                                        name="_csrf"
                                        value=""
                                    />
                                    <button
                                        type="submit"
                                        class="main__contenedor__table__body__fila--name--delete ml-1"
                                    >
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p>No tiene productos seleccionados</p>
                    </div>
                    <div class="main__contenedor__table__totalBox">
                        <span class="main__contenedor__table__totalBox--total"
                            >Total</span
                        >
                        <span class="main__contenedor__table__totalBox--pagar"
                            >S/. </span
                        >
                    </div>
                    <form action="#" class="main__contenedor__table__checkout">
                        <input type="submit" value="Checkout" />
                    </form>
                </div>
            </div>
        </main>
    <?php include VIEW_FRONT . DS . "footer.php"; ?>
       