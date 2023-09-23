<div class="admin__data">
    <h1 class="titulo-n2 text-center mb-5">Formulario Productos</h1>
    <form  class="admin__data__form mt-4" method="post" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <input 
                type="text" 
                placeholder="Nombre" 
                name="nombre" 
            >
            <div class="admin__data__form--error">
            </div>
        </div>
        <div class="form-group mb-2">
            <textarea name="" id="" cols="30" rows="5" placeholder="Descripción"></textarea>
        </div>
        <div class="form-group mb-2">
            <input 
                type="text" 
                placeholder="Precio" 
                name="precio" 
            >
            <div class="admin__data__form--error">
            </div>
        </div>
        <div class="form-group mb-2">
            <input 
                type="text" 
                placeholder="Cantidad" 
                name="cantidad" 
            >
            <div class="admin__data__form--error">
            </div>
        </div>
        <div class="form-group mb-2">
            <input type="file" name="imagen">
            <div class="admin__data__form--error">
                
            </div>
        </div>
        <div class="form-group mt-5">
            <input type="submit" value="Guardar" class="btnFullWidth color-blanco">
        </div>
    </form>
</div>