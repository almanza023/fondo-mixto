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

//FUNCION DE ESTADOS
const changeStatus = (url) => {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (data) {

            if (data.success) {
                success(data.success);
                updateTable();
            } else {
                warning(data.warning);
            }

        },
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
        let tipo_poblacion = button.data('tipo_poblacion');
        let modal = $(this);

        modal.find('.modal-body #id_row').val(id);
        modal.find('.modal-body #tipo_poblacion').val(tipo_poblacion);


    });
}
