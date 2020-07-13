$(function() {

    $('#indicador_id').select2();
    $('#guardar').click(function(e) {
        e.preventDefault();
        save();
    });

    $('#guardar2').click(function(e) {
        e.preventDefault();
        saveMeta();
    });

    $('#actualizar').click(function(e) {
        e.preventDefault();
        update();
    });

    showEdit();
});

const save = () => {
    let form = $('#form_create');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {

                success(data.success);
                $('#form_create')[0].reset();
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

const saveMeta = () => {
    let form = $('#form_create2');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                success(data.success);
                $('#form_create')[0].reset();
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

const changeStatus = (url) => {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                updateTable();
            } else {
                warning(data.warning);
            }

        },
    });
}

const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombre = button.data('nombre');
        let eje = button.data('eje');
        let meta = button.data('meta');
        let modal = $(this);

        modal.find('.modal-body #id_row').val(id);
        modal.find('.modal-body #nombre_indicador').val(nombre);
        modal.find('.modal-body #eje_id').val(eje);
        modal.find('.modal-body #meta').val(meta);

    });
}