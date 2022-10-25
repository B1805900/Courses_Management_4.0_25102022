$(document).ready(function(){
    $(".close-modal").click(function(){
        $(".modal").modal("hide");
    });
    $('.tooltip-r').tooltip();
    $('#confirmActionOnUser').on('hidden.bs.modal', function () {
        $('#ConfirmActionMsg').text('')
    })
});
