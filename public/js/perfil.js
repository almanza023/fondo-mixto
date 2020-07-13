$(function() {

    $('#btn-perfil').click(function(e) {
        e.preventDefault();
        updatePerfil();
    });


});





const updatePerfil = () => {
    let form = $('#form_perfil');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                success1(data.success);
                form[0].reset();
                $('#modalEditPerfil').modal('hide');
            } else {
                warning1(data.warning);
            }

        },
        error: function(data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage1(errors);
            }
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
const Toast1 = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

/*mensaje de guardado*/
const success1 = (mensaje) => {
    Toast.fire({
        type: 'success',
        title: `${mensaje}`
    })
}

/*mensaje de error*/
const warning1 = (mensaje) => {
    Toast.fire({
        type: 'error',
        title: `${mensaje}`
    })
}


const addErrorMessage1 = (errors) => {
    let messages = "";
    $.each(errors, function(key, value) {

        if ($.isPlainObject(value)) {
            $.each(value, function(key, value) {
                messages = messages + "<li><span class='font-bold text-danger'>" + value + "</span></li><br/>";
            });
        }
    });
    showErrorMessage1(messages);
}


const showErrorMessage1 = (messages) => {
    Swal.fire({
        title: "<strong>Error: Datos Incorrectos</strong>!",
        icon: 'error',
        html: messages
    });
}