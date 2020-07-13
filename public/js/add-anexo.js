$(function() {

    $('#documento_id').select2();



    $('#add-anexo').click(function(e) {
        e.preventDefault();
        saveAnexo();
    });
    modalShowAnexo();

});

const modalShowAnexo = () => {
    $('#modalAnexos').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let modal = $(this);
        modal.find('.modal-body #solicitud_id').val(id);

    });

}

//guardar en el form

const saveAnexo = () => {
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