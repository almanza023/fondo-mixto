$(function() {
    $('#indicador_id').select2();
    modalShow();
    modalShowAdd();
    modalShowActividad();
    modalShowObservacion();
    $('#agregar').click(function(e) {
        e.preventDefault();
        saveAdd();
    });

    $('#add-actividad').click(function(e) {
        e.preventDefault();
        saveActividad();
    });

    $('#add-observacion').click(function(e) {
        e.preventDefault();
        saveObservaciones();
    });







});


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

const modalShowAdd = () => {
    $('#modalIndicadores').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let modal = $(this);
        modal.find('.modal-body #solicitud_id').val(id);

    });

}

const modalShowActividad = () => {
    $('#modalActividades').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let modal = $(this);
        modal.find('.modal-body #proyecto_id').val(id);

    });

}


const modalShowObservacion = () => {
    $('#modalObservaciones').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let modal = $(this);
        modal.find('.modal-body #id_solicitud').val(id);

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
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                form[0].reset();
                success(data.success);
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

const saveObservaciones = () => {
    let form = $('#form_observacion');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                form[0].reset();
                success(data.success);
                updateTable();
                $('#modalObservaciones').modal('hide')
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

const saveAdd = () => {
    let form = $('#form_indicadores');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                form[0].reset();
                success(data.success);
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