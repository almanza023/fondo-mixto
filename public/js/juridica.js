$(function() {
    modalShow();
});


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



const updateRow = (status, id) => {

    $('#row-status-' + id).html("");

    if (status == 'Aprobado') {
        $('#row-status-' + id).html(status);
        $('#btn_deny-' + id).attr("disabled", true);
        $('#btn_show_send-' + id).show();
    }

}