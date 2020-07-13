$(function () {

    $('#añadir').click(function (e) {
        e.preventDefault();
        actividades();
    });
});


const actividades = () =>{
    let nombre = $('#nombre_actividad').val();
    let fecha_inicio = $('#fecha_inicio').val();
    let fecha_final = $('#fecha_final').val();
    //concardenar variables
    let resultado = `${nombre} ${fecha_inicio} ${fecha_final}`;
    alert(resultado);
    //limpiar campos
    $('#nombre_actividad').val("");
    $('#fecha_inicio').val("");
    $('#fecha_final').val("");
}


