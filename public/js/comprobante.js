$(function() {


    $('.lect').val('0');
    $('.lect').attr('readonly', 'readonly');


    $('#guardar').click(function(e) {

        save();

    });

    $('#actualizar').click(function(e) {
        e.preventDefault();
        update();
    });

    $(".del-comprobante").click(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Movimiento de registro',
            text: "¿Está Seguro de Eliminar el Comprobante seleccionado ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $('.form-del-com').submit();
            }
        })

    });

    $("#solicitud_id").change(showSolicitud);
    showSelect();
    calculos();

    $("#valor").keyup(function() {
        $("#por_servicio").val(0);
        $("#ret_servicio").val(0);
        $("#por_compra").val(0);
        $("#ret_compra").val(0);
        $("#admin_papeleria").val(0);
        $("#descuentos").val(0);
        $("#subtotal").val(0);
        $("#por_papeleria").val(0);
        $("#por_iva").val(0);
        $("#iva").val(0);



    });


});

//guardar en el form

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
                window.location.href = "../../../director"
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

//actualizar-editform
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
                window.location.href = '../';
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


const showSelect = () => {
    $("#solicitud_id").select2({
        ajax: {
            url: '../obtener-solicitudes',
            dataType: "json",
            type: "GET",
            data: function(params) {

                var queryParameters = {
                    term: params.term
                }
                return queryParameters;
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.titulo,
                            id: item.id + '_' + item.nid + '_' + item.razon_social + '_' + item.nombre +
                                '_' + item.apellido + '_' + item.representante_legal + '_' + item.tipo_solicitud
                        }

                    })
                };
            }
        }

    });
}

const showSolicitud = () => {
    let tipo = $('#tipo').val();

    datos = document.getElementById('solicitud_id').value.split('_');
    $("#id").val(datos[0]);

    $("#nit").val(datos[1]);
    $("#proponente").html(datos[2]);
    $("#tipo").html(datos[6]);



}

const ajaxHeader = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

/*mensaje de guardado*/
const success = (mensaje) => {
    Toast.fire({
        type: 'success',
        title: `${mensaje}`
    })
}

/*mensaje de error*/
const warning = (mensaje) => {
    Toast.fire({
        type: 'warning',
        title: `${mensaje}`
    })
}


const addErrorMessage = (errors) => {
    let messages = "";
    $.each(errors, function(key, value) {

        if ($.isPlainObject(value)) {
            $.each(value, function(key, value) {
                messages = messages + "<li><span class='font-bold text-danger'>" + value + "</span></li><br/>";
            });
        }
    });
    showErrorMessage(messages);
}

const showErrorMessage = (messages) => {
    Swal.fire({
        title: "<strong>Error: Datos Incorrectos</strong>!",
        icon: 'error',
        html: messages
    });
}

const porcentaje = () => {
    let valor = $('.porcentaje').val();
    if (valor >= 0 && valor <= 100) {
        warning('Porcentaje No Valido')
    }
}

const calculos = () => {
    $("#por_servicio").keyup(function() {
        let v = parseInt($("#valor").val(), 0);
        let p = ($("#por_servicio").val());
        if ((p) < 0 || (p) > 100) {
            warning('Porcentaje No Valido')
            $("#ret_servicio").val(0)
        } else {
            let t = v * (p / 100);
            $("#ret_servicio").val(t)
            totales();
        }

    });

    $("#por_compra").keyup(function() {
        let v = $("#valor").val();
        let p = $("#por_compra").val();
        if ((p) < 0 || (p) > 100) {
            warning('Porcentaje No Valido')
            $("#ret_compra").val(0)
        } else {
            let t = v * (p / 100);
            $("#ret_compra").val(t)
            totales();

        }

    });

    $("#por_papeleria").keyup(function() {
        let v = $("#valor").val();
        let p = $("#por_papeleria").val();
        if ((p) < 0 || (p) > 100) {
            warning('Porcentaje No Valido')
            $("#admin_papeleria").val(0)


        } else {
            let t = v * (p / 100);
            $("#admin_papeleria").val(t)
            totales();

        }
    });

    $("#por_descuento").keyup(function() {
        let v = $("#valor").val();
        let p = $("#por_descuento").val();
        if ((p) < 0 || (p) > 100) {
            $("#descuentos").val(0)
            warning('Porcentaje No Valido')
        } else {
            let t = v * (p / 100);
            $("#descuentos").val(Number(t))
            totales();

        }

    });
    $("#por_iva").keyup(function() {
        let v = $("#valor").val();
        let p = $("#por_iva").val();
        if ((p) < 0 || (p) > 100) {
            $("#iva").val(0)
            warning('Porcentaje No Valido')
        } else {
            let t = v * (p / 100);
            $("#iva").val(t)
            let subt = Number($("#subtotal").val());
            let iva = Number($("#iva").val());
            let tot = Number(subt) + Number(iva)
            $("#total").val(Number(tot));
        }

    });





}

const totales = () => {
    let v = $("#valor").val();
    let e1 = $("#ret_servicio").val();
    let e2 = $("#ret_compra").val();
    let e3 = $("#admin_papeleria").val();
    let e4 = $("#descuentos").val();

    let t = v - e1 - e2 - e3 - e4
    $("#subtotal").val(t);

}