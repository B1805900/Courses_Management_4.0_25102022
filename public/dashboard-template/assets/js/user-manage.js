$(document).ready(function(){
    // Tìm thông tin trong bảng
    $("#searchUserInput").on("keyup", function() {
        SearchByInputTable('searchUserInput','UserListTable');
    });
    // Hiện modal thêm user
    $("#addNewUser").click(function(){
        $('#addNewUserModal').modal('toggle');
    })
    // Lọc theo vai trò người dùng
    $("a.dropdown-item").click(function(){
        var selected = $(this).text();
        var findSelected  = selected
        if (selected == 'Tất cả'){
            findSelected = '';
        }
        SearchByString(findSelected,'UserListTable');
        $('#sortUserByRole').html(selected);
    });


  });
    // Thao tác trên người dùng
  $('.act-user-btn').click(function(){
    var iduser = $(this).parent().attr('id-user');
    var action = $(this).attr('id');
    ManageUsers(action,iduser);
    iduser = ""
    action = ""
})







