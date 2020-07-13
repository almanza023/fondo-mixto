$(function() {
    modalShow();
    $('#add-actividad').click(function(e) {
        e.preventDefault();
        saveActividad();
    });

    $('#add-presupuesto').click(function(e) {
        e.preventDefault();
        savePresupuesto();
    });
    $('#add-clausura').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Movimiento de registro',
            text: "¿Está Seguro de dar Clausura a la solicitud.?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                saveClausura();
            }
        })

    });
    $(".del-actividad").click(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Movimiento de registro',
            text: "¿Está Seguro de Eliminar la Actividad seleccionada ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $('.form-del-act').submit();
            }
        })

    });

    $(".del-presupuesto").click(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Movimiento de registro',
            text: "¿Está Seguro de Eliminar el Presupuesto Seleccionado ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $('.form-del-pre').submit();
            }
        })

    });

    $(".del-anexo").click(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Movimiento de registro',
            text: "¿Está Seguro de Eliminar el Anexo Seleccionado ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $('.form-del-ane').submit();
            }
        })

    });

    $("#recurso_municipio-999").keyup(function() {
        $('#ptotal').val('');

        total()
    });

    $("#fondo_mixto-999").keyup(function() {
        $('#ptotal').val('');
        total()
    });

    $("#ministerio_cultura-999").keyup(function() {
        $('#ptotal').val('');

        total()
    });

    $("#ingreso_propio-999").keyup(function() {
        $('#ptotal').val('');

        total()
    });

    $('#documento_id').select2();
    $('#add-anexo').click(function(e) {
        e.preventDefault();
        if (!$('#solicitud_id_edit').val() > 0) {
            warning('Debe seleccionar una solicitud')
        } else if (!$('#archivo').val() > 0) {
            warning('Debe seleccionar un Archivo')
        } else {
            saveAnexos();
        }
    });



})


const total = () => {
    var v1 = Number($('#recurso_municipio-999').val());
    var v2 = Number($('#fondo_mixto-999').val());
    var v3 = Number($('#ministerio_cultura-999').val());
    var v4 = Number($('#ingreso_propio-999').val());
    var t = v1 + v2 + v3 + v4;
    $('#ptotal').val(parseInt(t));

}

const modalShow = () => {
    $('#modalShow').on('show.bs.modal', function(event) {

        let button = $(event.relatedTarget)
        let url = button.data('href')

        let modal = $(this)

        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                modal.find('.modal-body').html(data);
                tooltipsMessages();
            }
        });
    });

    $('#modalShow').on('hide.bs.modal', function(e) {
        $(this).find('.modal-body').html("");
    });

}

const sendManagement = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Gerencia ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}


const enviarProyectos = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Proyecto ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })


}

const enviarJuridica = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Jurídica ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}

const enviarRecepcion = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Recepción ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}

const saveApprove = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                success(data.success);
                updateRow(data.status, data.solicitud);
                $('#' + button).attr("disabled", true);
            } else {
                warning(data.warning);
            }
        },
    });


}

const saveDeny = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                success(data.success);
                updateRow(data.status, data.order);
                $('#' + button).attr("disabled", true);
            } else {
                warning(data.warning);
            }
        },
    });


}

const updateRow = (status, id) => {

    $('#row-status-' + id).html("");

    if (status == 'Aprobado') {
        $('#row-status-' + id).html(status);
        $('#btn_deny-' + id).attr("disabled", true);
        $('#btn_show_send-' + id).show();
    }

}

const saveActividad = () => {
    let form = $('#form_actividad');
    let ids = $('#solicitud').val();
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                form[0].reset();
                success(data.success);
                window.location.href = ids;

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

const savePresupuesto = () => {
    let form = $('#form_presupuesto');
    let ids = $('#idsolicitud').val();
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                form[0].reset();
                success(data.success);
                window.location.href = ids;

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

const saveAnexos = () => {
    let form = $('#form')
    let ids = $('#solicitud_id_edit').val();
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
                window.location.href = ids;
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

const saveClausura = () => {
    let form = $('#form_clausura');
    let ids = $('#solicitud_id_clausura').val();
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                form[0].reset();
                success(data.success);
                window.location.href = ids;

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