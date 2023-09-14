import axios from 'axios';
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', () => {
    const eliminarProductoFormularios =
        document.querySelectorAll('.eliminarProducto');
    if (eliminarProductoFormularios.length > 0) {
        eliminarProductoFormularios.forEach(form => {
            form.addEventListener('submit', eliminarProducto);
        });
    }
});

function eliminarProducto(e) {
    e.preventDefault();
    // console.log(this.action);
    // axios.post(this.action).then(res => {
    //     console.log(res);
    // });

    Swal.fire({
        title: 'Eliminar Producto',
        text: "Un producto eliminado no se puede recuperar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then(result => {
        if (result.isConfirmed) {
            const productoId = this.children[0].value;
            const datos = {
                productoId
            }
            axios.post(this.action, datos).then(res => {
                console.log(res);
            })
            Swal.fire('Eliminado!', 'Tu producto ha sido eliminado.', 'success');
        }
    });
}
