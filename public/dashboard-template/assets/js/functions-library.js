function SearchByInputTable(S_input,S_table){
    var value = $('#'+S_input).val().toLowerCase();
      $("#"+S_table+" tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
}

function SearchByString(S_input,S_table){
    var value = S_input.toLowerCase();
    $("#"+S_table+" tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
}

function ManageUsers(action,iduser){
    if (action == "reset-pwd"){
        $('#ConfirmActionMsg').text('Bạn có muốn reset mật khẩu người dùng này, mật khẩu mặc định là User@123')
        $('#confirmActionOnUser').modal('toggle')
        $('#actionConfirmed').click(function(){
            ajaxCallManageUser(action,iduser)
            $("#confirmActionOnUser").modal("hide");
            $( "#actionConfirmed" ).off();

        })
    }
    else if(action == "lock-user"){
        $('#ConfirmActionMsg').text('Bạn có muốn khóa người dùng này, bạn vẫn có thể mở khóa người dùng này')
        $('#confirmActionOnUser').modal('toggle')
        $('#actionConfirmed').click(function(){
            ajaxCallManageUser(action,iduser)
            $("#confirmActionOnUser").modal("hide");
            $( "#actionConfirmed" ).off();

        })

    }
    else if(action == "unlock-user"){
        $('#ConfirmActionMsg').text('Bạn có muốn mở khóa người dùng này')
        $('#confirmActionOnUser').modal('toggle')
        $('#actionConfirmed').click(function(){
            ajaxCallManageUser(action,iduser)
            $("#confirmActionOnUser").modal("hide");
            $( "#actionConfirmed" ).off();
        })
    }
    else if(action == "delete-user"){
        $('#ConfirmActionMsg').text('Bạn có xóa người dùng này, thông tin sẽ mất vĩnh viễn')
        $('#confirmActionOnUser').modal('toggle')
        $('#actionConfirmed').click(function(){
            ajaxCallManageUser(action,iduser)
            $("#confirmActionOnUser").modal("hide");
            $( "#actionConfirmed" ).off();
        })
    }
}

function ajaxCallManageUser(action,iduser){
    // Cập nhật người dùng


    $.ajax({
        url: "actionOnUser/" + iduser+"/"+action,
        type: "GET",
        data: {},
        success: function (data) {
            console.log(data);
            reloadUserList(data)
            $.toast({
                text: "Cập nhật người dùng thành công!", // Text that is to be shown in the toast
                heading: 'Thành công', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'slide', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 3, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader

            });
        },
        error: function () {
            $.toast({
                text: "Cập nhật người dùng không thành công!", // Text that is to be shown in the toast
                heading: 'Lỗi!', // Optional heading to be shown on the toast
                icon: 'error', // Type of toast icon
                showHideTransition: 'slide', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 3, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader

            });
        }
    })
}
// Tải lại bảng danh sách người dùng
function reloadUserList(data){
    $.each(data, function(key, val){

    })
}

$(document).ready(function(){
    $(".search-input").keyup(function(){
        let value = $('.search-input').val().toLowerCase();
        $(".search-table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    })

})









