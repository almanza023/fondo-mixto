$(function() {
    $("#formlogin").submit(function(event) {

        event.preventDefault();
        login();
    });
});

const login = () => {
    let form = $('#formlogin');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                Swal.fire({
                    title: 'Bienvenido al Sistema',
                    text: data.success,
                    icon: 'success',

                });
                setTimeout(function() {
                    window.location.href = "home";
                }, 4000)

            } else {
                Swal.fire({
                    title: 'FOMIX',
                    text: data.warning,
                    icon: 'danger',

                });
            }
        },
        error: function(data) {
            if (data.status === 422) {


            }
        }
    });

}