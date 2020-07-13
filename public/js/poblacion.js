$(function () {

    $('#guardar').click(function (e) {
        e.preventDefault();
        save();
    });

    $('#actualizar').click(function (e) {
        e.preventDefault();
        update();
    });

    showEdit();
});




//guardar en el form
const save = () => {
    let form = $('#form_create');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function (data) {

            if (data.success) {

                success(data.success);
                $('#form_create')[0].reset();
                updateTable();
            } else {
                warning(data.warning);

            }

        },
        error: function (data) {

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
        success: function (data) {

            if (data.success) {
                success(data.success);
                $('#modalEdit').modal('hide');
                updateTable();
            } else {
                warning(data.warning);
            }

        },
        error: function (data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}


/* Mostar informacion  en los campos del modal*/

const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id');
    let item = button.data('item');
    let clasificacion_id = button.data('clasificacion_id');
    let detalle = button.data('detalle');
    let modal = $(this);

    modal.find('.modal-body #id_row').val(id);
    modal.find('.modal-body #item').val(item);
    modal.find('.modal-body #clasificacion_id').val(clasificacion_id);
    modal.find('.modal-body #detalle').val(detalle);

    });

}
