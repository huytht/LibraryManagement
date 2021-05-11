$('#btnLogin').click(function () {
    $.ajax({
        url: "blocks/formlogin.php",
        type: 'GET',
        success: function (res) {
            $('#loginModal').modal('show')
        }
    });
})
$('#btnChangePwd').click(function () {
    $.ajax({
        url: "blocks/menu.php",
        type: 'GET',
        success: function (res) {
            $('#cpModal').modal("show")
        }
    });
})

$('#login_button').click(function () {
    var username = $('#username').val();
    var password = $('#password').val();
    if (username != '' && password != '') {
        $.ajax({
            url: "loginLogout.php",
            type: 'GET',
            data: {
                idAccount: username,
                password: password
            },
            success: function (data) {
                if (data == 'None') {
                    alert("Đăng nhập thất bại");
                } else{
                    alert("Đăng nhập thành công");
                    $('#loginModal').modal('hide');
                    location.reload();
                } 
           }
        });
    }
    else {
        alert("Tài khoản và mật khẩu không được để trống!!");
    }
});
$('#btnLogout').click(function(){  
    var action = "logout";  
    $.ajax({  
        url: "loginLogout.php",  
        type: "GET",  
        data:{
            action: action
        },
        success: function(){
            $("#accountDetail").hide();
            location.reload();
        }  
    });  
});  
$('#btnCP').click(function(){
    var old_password = $('#old_password').val();
    var new_password = $('#new_password').val();
    var password_comfirm = $('#password_confirm').val();
    $.ajax({
        url: "loginlogout.php",
        type: "POST",
        data: {
            oPwd: old_password,
            nPwd: new_password,
            PwdC: password_comfirm
        },
        success: function(data){
            if (data == 'None') {
                alert("Mật khẩu không chính xác!!");
            } else if (data == 'Dont match'){
                alert("Mật khẩu mới và mật khẩu xác nhận không trùng khớp");
            } else {
                alert("Đổi mật khẩu thành công!!");
                $('#cpModal').modal('hide');
                location.reload();
            }
        }
    })
})
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }


