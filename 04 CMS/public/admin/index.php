<?php require_once("../../resources/config.php"); ?>
<?php include VIEW_BACK . DS . "head.php"; ?>

<section class="admin">
    <div class="admin__menu">
        <img src="../img/logo-kompi-dark.png" alt="" class="admin__data__logo mb-3">
        <ul class="admin__menu__box">
            <li class="admin__menu__box__item">
                <a href="/" class="admin__menu__box__item--link">Home</a>
            </li>
            <li class="admin__menu__box__item">
                <a href="/admin/categorias" class="admin__menu__box__item--link">Categorias</a>
            </li>
            <li class="admin__menu__box__item">
                <a href="/admin/productos" class="admin__menu__box__item--link">Productos</a>
            </li>
            <li class="admin__menu__box__item">
                <a href="/admin/pedidos" class="admin__menu__box__item--link">Pedidos</a>
            </li>
            <li class="admin__menu__box__item">
                <a href="/admin/comentarios" class="admin__menu__box__item--link">Comentarios</a>
            </li>
        </ul>
    </div>
    <div class="admin__data">
        <h1 class="titulo-n2 text-center mb-5">Todos Los productos</h1>
        <a href="/admin/productos/crear" class="btn btnBG-naranja color-blanco mb-5">Crear Producto</a>
        
        <div class="admin__data__box">
           

            <div class="admin__data__box__header">
                <div class="admin__data__box__header--name data-id">
                    ID
                </div>
                <div class="admin__data__box__header--name data-nombre">
                    NOMBRE
                </div>
                <div class="admin__data__box__header--name data-desc">
                    DESCRIPCIÓN
                </div>
                <div class="admin__data__box__header--name data-img">
                    IMAGEN
                </div>
                <div class="admin__data__box__header--name data-precio">
                    PRECIO
                </div>
                <div class="admin__data__box__header--name data-canti">
                    CANTIDAD
                </div>
                <div class="admin__data__box__header--name data-ac">
                    ACCIONES
                </div>
            </div>
            <div class="admin__data__box__body">
                <div class="admin__data__box__body__fila">
                    <div class="admin__data__box__body__fila--name data-id">
                        <%- producto.id %>
                    </div>
                    <div class="admin__data__box__body__fila--name data-nombre">
                        <%- producto.nombre %>
                    </div>
                    <div class="admin__data__box__body__fila--name data-desc">
                        <%- producto.descripcion %>
                    </div>
                    <div class="admin__data__box__body__fila--name data-img">
                        <img src="/uploads/productos/<%- producto.imagen %>" alt="">
                    </div>
                    <div class="admin__data__box__body__fila--name data-precio">
                        S/. <%-producto.precio %>
                    </div>
                    <div class="admin__data__box__body__fila--name data-canti">
                        <%-producto.cantidad %>
                    </div>
                    <div class="admin__data__box__body__fila--name data-ac">
                        <a href="/admin/productos/editar/<%- producto.id %>" class="admin__data__box__body__fila--name--editar">editar</a>
                        <form action="/admin/productos/delete?_csrf=<%- csrfToken %>" method="post" class="eliminarProducto">
                            <input type="hidden" value=<%- producto.id %>>
                            <input type="hidden" name="_csrf" value=<%- csrfToken %>>
                            <input type="submit" value="borrar" class="admin__data__box__body__fila--name--borrar ml-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php include VIEW_BACK . DS . "footer.php"; ?>