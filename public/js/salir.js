$(function() {

    function salir() {
        $("#logout-form").submit(function(event) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        event.preventDefault();
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });


        });
    }
});