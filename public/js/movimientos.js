const sendManagement = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Gerencia ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}

const enviarAsistente = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Asistente Administrativo ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}


const enviarProyectos = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Proyecto ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })


}

const enviarJuridica = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Jurídica ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}

const enviarRecepcion = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Recepción ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}

const enviarDirector = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Director Administrativo ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}

const enviarArchivo = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    Swal.fire({
        title: 'Movimiento de Solicitud',
        text: "¿Está Seguro de enviar la solicitud a Archivo ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        updateTable();
                        $('#modalShow').modal('hide');
                    } else {
                        warning(data.warning);
                    }
                },
            });
        }
    })




}

const saveApprove = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                success(data.success);
                updateRow(data.status, data.solicitud);
                $('#' + button).attr("disabled", true);
            } else {
                warning(data.warning);
            }
        },
    });


}

const saveDeny = (context) => {

    let button = context.id;
    let url = $('#' + button).data('href');

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                success(data.success);
                updateRow(data.status, data.order);
                $('#' + button).attr("disabled", true);
            } else {
                warning(data.warning);
            }
        },
    });


}