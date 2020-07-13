$(function() {


    $("#descripcion_solicitud").keyup(function() {
        $("#parrafo").val($('#descripcion_solicitud').val());
    });

    $("#recurso_municipio-999").keyup(function() {
        $('#ptotal').val('');

        total()
    });

    $("#fondo_mixto-999").keyup(function() {
        $('#ptotal').val('');
        total()
    });

    $("#ministerio_cultura-999").keyup(function() {
        $('#ptotal').val('');

        total()
    });

    $("#ingreso_propio-999").keyup(function() {
        $('#ptotal').val('');

        total()
    });




    clearFormData();
    modalShow();
    clasificacionesChange();
    buttonsAdd();
    formCreate();

});

const total = () => {
    var v1 = Number($('#recurso_municipio-999').val());
    var v2 = Number($('#fondo_mixto-999').val());
    var v3 = Number($('#ministerio_cultura-999').val());
    var v4 = Number($('#ingreso_propio-999').val());
    var t = v1 + v2 + v3 + v4;
    $('#ptotal').val(parseInt(t));

}

//guardar en el form
const save = (form, formData) => {

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {

            if (data.success) {

                success(data.success);
                clearFormData();
                updateTable();
                $('#btn-guardar-solicitud').show();
                $('#btn-formato').hide();
                $('#btn-poblacion').hide();
                $('#btn-actividades').hide();
                $('#btn-presupuesto').hide();
                $('#btn-documentos').hide();
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

// Utilizar este codigo para departamentos
const clearSelectPoblaciones = () => {
    $('.poblaciones').find('option:not(:first)').remove();
}

const changePoblaciones = (value) => {
    for (let p of poblaciones) {
        if (p.clasificacion_id == value) {
            $(".poblaciones").append('<option value="' + p.id + '">' + p.detalle + '</option>');
            $(".poblaciones").val(p.id);
        }
    }
    $(".poblaciones").val('0');
}


const addItemsPoblacion = (tr) => {

    let clasificacion = $('#clasificacion_id-999').val();
    let poblacion = $('#poblacion_id-999').val();
    let total = $('#total-999').val();

    let items = [clasificacion, poblacion, total];

    if (validatedItems(items)) {
        if (tr != 0) {
            deleteItemPoblacion(tr);
            addTablePoblacion(tr, clasificacion, poblacion, total);
            tr_poblacion = 0;
        } else {
            x_poblacion++;
            addTablePoblacion(x_poblacion, clasificacion, poblacion, total);
        }

        $('#clasificacion_id-999').val('0');
        $('#poblacion_id-999').val('0');
        $('#total-999').val('');

    } else {
        warning('POR FAVOR ESCOGER TODAS LAS OPCIONES DISPONIBLES')
    }


}

const addItemsActividad = (tr) => {

    let actividad = $.trim($("#nombre_actividad-999").val());
    let fecha_ini = $('#fecha_inicio-999').val();
    let fecha_fin = $('#fecha_final-999').val();

    let items = [actividad, fecha_ini, fecha_fin];

    if (validatedItems(items)) {
        if (tr != 0) {
            deleteItemActividad(tr);
            addTableActividad(tr, actividad, fecha_ini, fecha_fin);
            tr_actividad = 0;
        } else {
            x_actividad++;
            addTableActividad(x_actividad, actividad, fecha_ini, fecha_fin);
        }

        $('#nombre_actividad-999').val('');
        $('#fecha_inicio-999').val('');
        $('#fecha_final-999').val('');

    } else {
        warning('POR FAVOR ESCOGER TODAS LAS OPCIONES DISPONIBLES')
    }

}

const addItemsPresupuesto = (tr) => {

    let rubro = $("#rubro-999").val();
    let recurso_municipio = $('#recurso_municipio-999').val();
    let fondo_mixto = $('#fondo_mixto-999').val();
    let ministerio_cultura = $('#ministerio_cultura-999').val();
    let ingreso_propio = $('#ingreso_propio-999').val();

    let items = [rubro, recurso_municipio, fondo_mixto, ministerio_cultura, ingreso_propio];

    if (validatedItems2(items)) {
        if (tr != 0) {
            deleteItemPresupuesto(tr);
            addTablePresupuesto(tr, rubro, recurso_municipio, fondo_mixto, ministerio_cultura, ingreso_propio);
            tr_presupuesto = 0;
        } else {
            x_presupuesto++;
            addTablePresupuesto(x_presupuesto, rubro, recurso_municipio, fondo_mixto, ministerio_cultura, ingreso_propio);
        }

        $("#rubro-999").val('');
        $('#recurso_municipio-999').val('');
        $('#fondo_mixto-999').val('');
        $('#ministerio_cultura-999').val('');
        $('#ingreso_propio-999').val('');
        $('#ptotal').val('');

    } else {
        warning('POR FAVOR ESCOGER TODAS LAS OPCIONES DISPONIBLES')
    }

}

const addTablePoblacion = (x, clasificacion, poblacion, total) => {

    let name_poblacion = namePoblacion(poblacion);
    let name_clasificacion = nameClasificacion(clasificacion);

    let htmlTags = `<tr id="item_poblacion_${x}">
        <td>${x}</td>
        <td class="text-center">${name_clasificacion}</td>
        <td class="text-center">${name_poblacion}</td>
        <td class="text-center">${total}</td>
        <td class="text-center">
            <button  type="button" class="btn btn-primary" onclick="addFormPoblacion(${clasificacion},${poblacion},${total},${x})" ><i class="fas fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger" onclick="deleteItemPoblacion(${x})"><i class="fas fa-trash-alt"></i></button>
        </td>
    </tr>`;

    $('#table_poblacion tbody').append(htmlTags);

    $("#table_poblacion_empty").val("0");

    $('#clonar_poblacion').append(cloneInputsPoblacion(x, poblacion, total));

}

const addTableActividad = (x, actividad, fecha_ini, fecha_fin) => {
    let htmlTags = `<tr id="item_actividad_${x}">
            <td>${x}</td>
            <td class="text-center">${actividad}</td>
            <td class="text-center">${fecha_ini}</td>
            <td class="text-center">${fecha_fin}</td>
            <td class="text-center">
                <button type="button" class="btn btn-primary" onclick="addFormActividad(${x},'${actividad}', '${fecha_ini}', '${fecha_fin}')" ><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-danger" onclick="deleteItemActividad(${x})"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>`;

    $('#table_actividad tbody').append(htmlTags);

    $("#table_actividad_empty").val("0");

    $('#clonar_actividad').append(cloneInputsActividad(x, actividad, fecha_ini, fecha_fin));

}

const addTablePresupuesto = (x, rubro, recurso_municipio, fondo_mixto, ministerio_cultura, ingreso_propio) => {
    let htmlTags = `<tr id="item_presupuesto_${x}">
            <td>${x}</td>
            <td class="text-center">${formatterPeso.format(rubro)}</td>
            <td class="text-center">${formatterPeso.format(recurso_municipio)}</td>
            <td class="text-center">${formatterPeso.format(fondo_mixto)}</td>
            <td class="text-center">${formatterPeso.format(ministerio_cultura)}</td>
            <td class="text-center">${formatterPeso.format(ingreso_propio)}</td>
            <td class="text-center">
                <button type="button" class="btn btn-primary" onclick="addFormPresupuesto(${x}, ${rubro}, ${recurso_municipio}, ${fondo_mixto}, ${ministerio_cultura}, ${ingreso_propio})"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-danger" onclick="deleteItemPresupuesto(${x})"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>`;

    $('#table_presupuesto tbody').append(htmlTags);

    $("#table_presupuesto_empty").val("0");

    $('#clonar_presupuesto').append(cloneInputsPresupuesto(x, rubro, recurso_municipio, fondo_mixto, ministerio_cultura, ingreso_propio));

}

const cloneInputsPoblacion = (x, poblacion, total) => {
    return `<div id="clone_poblacion-${x}">
    <input type="number" style="display:none;" name="id_poblacion[]" id="id_poblacion-${x}" value="${poblacion}">
    <input type="hidden" name="total[]" id="total-${x}" value="${total}">
    </div>`
}

const cloneInputsActividad = (x, actividad, fecha_ini, fecha_fin) => {

    return `<div id="clone_actividad-${x}">
    <textarea style="display:none;" name="nombre_actividad[]" id="nombre_actividad-${x}">${actividad}</textarea>
    <input type="hidden" name="fecha_inicio[]" id="fecha_inicio-${x}" value="${fecha_ini}">
    <input type="hidden" name="fecha_final[]" id="fecha_final-${x}" value="${fecha_fin}">
    </div>`;

}

const cloneInputsPresupuesto = (x, rubro, recurso_municipio, fondo_mixto, ministerio_cultura, ingreso_propio) => {

    return `<div id="clone_presupuesto-${x}">
    <input type="hidden" name="rubro[]" id="rubro-${x}" value="${rubro}">
    <input type="hidden" name="recurso_municipio[]" id="recurso_municipio-${x}" value="${recurso_municipio}">
    <input type="hidden" name="fondo_mixto[]" id="fondo_mixto-${x}" value="${fondo_mixto}">
    <input type="hidden" name="ministerio_cultura[]" id="ministerio_cultura-${x}"  value="${ministerio_cultura}">
    <input type="hidden" name="ingreso_propio[]" id="ingreso_propio-${x}" value="${ingreso_propio}">
    </div>`;

}

const addFormPoblacion = (clasificacion, poblacion, total, tr) => {
    $('#clasificacion_id-999').val(clasificacion);
    changePoblaciones(clasificacion)
    $('#poblacion_id-999').val(poblacion);
    $('#total-999').val(total);
    tr_poblacion = tr;
}

const addFormActividad = (x, actividad, fecha_ini, fecha_final) => {

    $('#nombre_actividad-999').val(actividad);
    $('#fecha_inicio-999').val(fecha_ini);
    $('#fecha_final-999').val(fecha_final);

    tr_actividad = x;
}

const addFormPresupuesto = (x, rubro, recurso_municipio, fondo_mixto, ministerio_cultura, ingreso_propio) => {

    $("#rubro-999").val(rubro);
    $('#recurso_municipio-999').val(recurso_municipio);
    $('#fondo_mixto-999').val(fondo_mixto);
    $('#ministerio_cultura-999').val(ministerio_cultura);
    $('#ingreso_propio-999').val(ingreso_propio);

    tr_presupuesto = x;
}

const namePoblacion = (poblacion) => {

    for (let p of poblaciones) {
        if (p.id == poblacion) {
            return p.detalle;
        }
    }

}

const nameClasificacion = (clasificacion) => {

    for (let c of clasificaciones) {
        if (c.id == clasificacion) {
            return c.tipo_poblacion;
        }
    }

}

const deleteItemPoblacion = (value) => {
    $("#item_poblacion_" + value).remove();
    $('#clone_poblacion-' + value).remove();
}

const deleteItemActividad = (value) => {
    $("#item_actividad_" + value).remove();
    $('#clone_actividad-' + value).remove();
}

const deleteItemPresupuesto = (value) => {
    $("#item_presupuesto_" + value).remove();
    $('#clone_presupuesto-' + value).remove();
}

const validatedItems = (items) => {

    for (let index = 0; index < items.length; index++) {

        if (items[index] == '' || items[index] == '0') {
            return false;
        }

    }

    return true;
}

const validatedItems2 = (items) => {

    for (let index = 0; index < items.length; index++) {

        if (items[index] == '') {
            return false;
        }

    }

    return true;
}

const formatterPeso = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    minimumFractionDigits: 0
})


const changeSolicitud = (value) => {
    for (let c of categorias) {
        if (c.id == value) {
            if (c.tipo_solicitud == 'Proyecto') {
                $('#btn-formato').show();
                $('#btn-poblacion').show();
                $('#btn-actividades').show();
                $('#btn-presupuesto').show();
                $('#btn-documentos').show();
                $('#btn-guardar-solicitud').show();
                $('#n_asunto').text('Nombre del Proyecto')
            } else {
                $('#btn-guardar-solicitud').show();
                $('#btn-formato').hide();
                $('#btn-poblacion').hide();
                $('#btn-actividades').hide();
                $('#btn-presupuesto').hide();
                $('#btn-documentos').hide();

            }
        }
    }
}

const validateSolicitud = (url) => {

    let archivo = document.getElementById('archivo_solicitud');

    let data = new FormData();
    data.append("categoria", $('#categoria_id').val());
    data.append("solicitante", $('#solicitante_id').val());
    data.append("descripcion", $('#descripcion_solicitud').val());
    data.append("archivo", archivo.files[0]);


    $.ajax({
        data: data,
        url: url,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        success: function(data) {
            if (data.success) {
                $('#form_solicitud').val("1");
                $('#modalCreate').modal('hide');
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

const validateFormato = (url) => {


    let data = new FormData();

    data.append("titulo", $('#titulo').val());
    data.append("fecha_ini", $('#fecha_ini').val());
    data.append("fecha_fin", $('#fecha_fin').val());
    data.append("descripcion_proyecto", $('#descripcion_proyecto').val());
    data.append("id_linea", $('#id_linea').val());
    data.append("antecedentes", $('#antecedentes').val());
    data.append("justificacion", $('#justificacion').val());
    data.append("metodologia", $('#metodologia').val());
    data.append("objetivo_general", $('#objetivo_general').val());
    data.append("objetivo_especifico", $('#objetivo_especifico').val());
    data.append("metas", $('#metas').val());

    $.ajax({
        data: data,
        url: url,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        success: function(data) {
            if (data.success) {
                $('#form_formato').val("1");
                $('#modalFormato').modal('hide');
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


const validatePoblacion = (url) => {

    if ($("#table_poblacion_empty").val() == 1 || $("#clonar_poblacion").html() == "") {

        let data = new FormData();
        data.append("poblacion", $('#poblacion_id-999').val());
        data.append("total", $('#total-999').val());
        data.append("fuente_verificacion", $('#fuente_verificacion').val());

        $.ajax({
            data: data,
            url: url,
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            success: function(data) {
                if (data.success) {
                    if ($("#clonar_poblacion").html() != "") {
                        $('#form_poblacion').val("1");
                        $('#modalPoblacion').modal('hide');
                    } else {
                        warning("POR FAVOR AGREGUE UN REGISTRO A LA TABLA");
                    }
                }
            },
            error: function(data) {
                if (data.status === 422) {
                    let errors = $.parseJSON(data.responseText);
                    addErrorMessage(errors);
                }
            }
        });

    } else {
        $('#form_poblacion').val("1");
        $('#modalPoblacion').modal('hide');
    }


}


const validateActividad = (url) => {

    if ($("#table_actividad_empty").val() == 1 || $("#clonar_actividad").html() == "") {

        let data = new FormData();
        data.append("nombre_actividad", $('#nombre_actividad-999').val());
        data.append("fecha_inicio", $('#fecha_inicio-999').val());
        data.append("fecha_final", $('#fecha_final-999').val());

        $.ajax({
            data: data,
            url: url,
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            success: function(data) {
                if (data.success) {
                    if ($("#clonar_actividad").html() != "") {
                        $('#form_actividad').val("1");
                        $('#modalActividades').modal('hide');
                    } else {
                        warning("POR FAVOR AGREGUE UN REGISTRO A LA TABLA");
                    }
                }
            },
            error: function(data) {
                if (data.status === 422) {
                    let errors = $.parseJSON(data.responseText);
                    addErrorMessage(errors);
                }
            }
        });

    } else {
        $('#form_actividad').val("1");
        $('#modalActividades').modal('hide');
    }

}


const validatePresupuesto = (url) => {

    if ($("#table_presupuesto_empty").val() == 1 || $("#clonar_presupuesto").html() == "") {

        let data = new FormData();
        data.append("rubro", $('#rubro-999').val());
        data.append("recurso_municipio", $('#recurso_municipio-999').val());
        data.append("fondo_mixto", $('#fondo_mixto-999').val());
        data.append("ministerio_cultura", $('#ministerio_cultura-999').val());
        data.append("ingreso_propio", $('#ingreso_propio-999').val());


        $.ajax({
            data: data,
            url: url,
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            success: function(data) {
                if (data.success) {
                    if ($("#clonar_presupuesto").html() != "") {
                        $('#form_presupuesto').val("1");
                        $('#modalPresupuesto').modal('hide');
                    } else {
                        warning("POR FAVOR AGREGUE UN REGISTRO A LA TABLA");
                    }
                }
            },
            error: function(data) {
                if (data.status === 422) {
                    let errors = $.parseJSON(data.responseText);
                    addErrorMessage(errors);
                }
            }
        });

    } else {
        $('#form_presupuesto').val("1");
        $('#modalPresupuesto').modal('hide');
    }

}

const clearFormData = () => {
    $('#form_solicitud').val("0");
    $('#form_formato').val("0");
    $('#form_poblacion').val("0");
    $('#form_actividad').val("0");
    $('#form_presupuesto').val("0");

    $('#form_create')[0].reset();

    $('.select2').select2({
        placeholder: '-- Escoger Opciones --',
    });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4',
    });


    $("#clonar_presupuesto").html("");
    $("#clonar_actividad").html("");
    $("#clonar_poblacion").html("");

    $('#table_presupuesto tbody').html("");
    $('#table_actividad tbody').html("");
    $('#table_poblacion tbody').html("");

}

const popovers = () => {
    $('.show-details').popover();
    $('.add-documents').popover();
    $('.send-gerencia').popover();
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
                tooltipsMessages();
            }
        });
    });

    $('#modalShow').on('hide.bs.modal', function(e) {
        $(this).find('.modal-body').html("");
    });

}

const clasificacionesChange = () => {
    $('.clasificaciones').change(function(e) {
        clearSelectPoblaciones();
        changePoblaciones(this.value);
    });
}

const buttonsAdd = () => {

    $('#btnAddPoblacion').click(function(e) {
        e.preventDefault();
        addItemsPoblacion(tr_poblacion);
    });

    $('#btnAddActividad').click(function(e) {
        e.preventDefault();
        addItemsActividad(tr_actividad);
    });

    $('#btnAddPresupuesto').click(function(e) {
        e.preventDefault();
        addItemsPresupuesto(tr_presupuesto);
    });

}

const formCreate = () => {
    $('#form_create').on('submit', function(e) {
        e.preventDefault();

        let form = $('#form_create');
        let formData = new FormData(this);
        formData.append('_token', $('input[name=_token]').val());

        save(form, formData);

    });
}