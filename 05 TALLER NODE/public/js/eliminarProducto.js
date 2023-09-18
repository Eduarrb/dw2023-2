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
            axios
                .post(this.action, datos)
                .then(res => {
                   Swal.fire('Eliminado!', res.data, 'success');
                   this.parentElement.parentElement.remove();
                })
                .catch(error => {
                    console.log(error);
                    if(error.response.status == 404){
                        Swal.fire('Error', error.response.data, 'error')
                    }
                })
        }
    }).catch(err => {
        console.log(err);
    })
}
