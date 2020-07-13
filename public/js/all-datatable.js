$(function() {
    ajaxHeader();
    dataTableInit();
    tooltipsMessages();
})


const dataTableInit = () => {
    $('.mejoratb').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        responsive: true,
        lengthMenu: [
            [10, 40, 60, -1],
            [10, 40, 60, "Todo"]
        ],



        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": 'Copiar',
                "csv": 'Exportar a CSV',
                "excel": 'Exportar a Excel',
                "print": 'Imprimir',
            }
        }
    });
}


const ajaxHeader = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

}

function disableEnterKey(e) {
    let key;
    if (window.event) {
        key = window.event.keyCode; //IE
    } else {
        key = e.which; //firefox
    }
    if (key == 13) {
        return false;
    } else {
        return true;
    }
}

/*Mostrar mensaje*/
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

/*mensaje de guardado*/
const success = (mensaje) => {
    Toast.fire({
        type: 'success',
        title: `${mensaje}`
    })
}

/*mensaje de error*/
const warning = (mensaje) => {
    Toast.fire({
        type: 'error',
        title: `${mensaje}`
    })
}


const addErrorMessage = (errors) => {
    let messages = "";
    $.each(errors, function(key, value) {

        if ($.isPlainObject(value)) {
            $.each(value, function(key, value) {
                messages = messages + "<li><span class='font-bold text-danger'>" + value + "</span></li><br/>";
            });
        }
    });
    showErrorMessage(messages);
}


const showErrorMessage = (messages) => {
    Swal.fire({
        title: "<strong>Error: Datos Incorrectos</strong>!",
        icon: 'error',
        html: messages
    });
}

/*recarga-actualizar tbla*/
const updateTable = () => {
    let form = $('#form_hidden');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        success: function(data) {
            if (data.warning) {
                warning(data.warning);
            } else {
                $('#id_table').html("");
                $('#id_table').html(data);
                dataTableInit();
                tooltipsMessages();
            }
        }
    });
}

const tooltipsMessages = () => {
    $('[data-toggle="tooltip"]').tooltip();
}