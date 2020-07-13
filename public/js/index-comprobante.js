$(function() {

    $(".del-comprobante").click(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Movimiento de registro',
            text: "¿Está Seguro de Eliminar el Comprobante seleccionado ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $('.form-del-com').submit();
            }
        })

    });




});