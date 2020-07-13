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


const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombre = button.data('nombre');
        let categoria = button.data('categoria');
        let modal = $(this);

        modal.find('.modal-body #id_row').val(id);
        modal.find('.modal-body #tipo_documento').val(nombre);
        modal.find('.modal-body #categoria').val(categoria);

    });
}
