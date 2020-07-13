$(function() {

    $('#documento_id').select2();
    $('#guardar').click(function(e) {
        e.preventDefault();
        if (!$('#solicitud_id').val() > 0) {
            warning('Debe seleccionar una solicitud')
        } else if (!$('#archivo').val() > 0) {
            warning('Debe seleccionar un Archivo')
        } else {
            save();
        }
    });

    $('#actualizar').click(function(e) {
        e.preventDefault();
        save();
    });

    $("#solicitud_id").change(showSolicitud);
    showSelect();

});

//guardar en el form

const save = () => {
    let form = $('#form')
    let formData = new FormData(this.form);
    formData.append('_token', $('input[name=_token]').val());
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        dataType: 'json',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data.success) {
                success(data.success);
            } else {
                warning(data.warning);
            }
        },
        error: function(data) {
            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });
}

//actualizar-editform
const update = () => {
    let form = $('#form_edit');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                $('#modalEdit').modal('hide');
                updateTable();
            } else {
                warning(data.warning);
            }

        },
        error: function(data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}


const showSelect = () => {
    $("#solicitud_id").select2({
        ajax: {
            url: '../obtener-solicitudes',
            dataType: "json",
            type: "GET",
            data: function(params) {

                var queryParameters = {
                    term: params.term
                }
                return queryParameters;
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.titulo,
                            id: item.id + '_' + item.descripcion + '_' + item.razon_social + '_' + item.nombre +
                                '_' + item.apellido + '_' + item.representante_legal + '_' + item.tipo_solicitud
                        }

                    })
                };
            }
        }

    });
}

const showSolicitud = () => {
    let tipo = $('#tipo').val();

    datos = document.getElementById('solicitud_id').value.split('_');
    $("#id").val(datos[0]);

    $("#descripcion").val(datos[1]);
    $("#proponente").html(datos[2]);
    $("#tipo").html(datos[6]);
    if (tipo == 'Natural') {
        alert('natural');
        $('.categoria3').show();
        $('.categoria1').hide();
        $('.categoria2').hide();
        $('.categoria4').hide();

    } else {
        $('.categoria3').hide();
        $('.categoria1').show();
        $('.categoria2').show();
        $('.categoria4').show();
    }



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
        type: 'warning',
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