$(function() {

    $('#guardar').click(function(e) {
        e.preventDefault();
        save();
    });

    $('#actualizar').click(function(e) {
        e.preventDefault();
        update();
    });

    $('#asignar').click(function(e) {
        e.preventDefault();
        changeDependencia();
    });

    showEdit();
    modalShow();
    modalChange();
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

const changeDependencia = () => {
    let form = $('#form_change');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {

                success(data.success);
                $('#modalChange').modal('hide');
                form[0].reset();
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
                form[0].reset();
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


const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nid = button.data('nid');
        let nombre = button.data('nombre');
        let apellido = button.data('apellido');
        let email = button.data('email');
        let celular = button.data('celular');

        let modal = $(this);

        modal.find('.modal-body #id_row').val(id);
        modal.find('.modal-body #nid').val(nid);
        modal.find('.modal-body #nombre').val(nombre);
        modal.find('.modal-body #apellido').val(apellido);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #celular').val(celular);

        //$("input[name=is_jefe][value='1']").prop("checked", true);


    });
}

const changeBoss = (url) => {
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
            }
        });
    });


    $('#modalShow').on('hide.bs.modal', function(e) {
        $(this).find('.modal-body').html("");
    });

}

const modalChange = () => {
    $('#modalChange').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let dependencia = button.data('dependencia');

        let modal = $(this);

        modal.find('.modal-body #id_change').val(id);
        modal.find('.modal-body #dependencia_change_id').val(dependencia);

    });
}