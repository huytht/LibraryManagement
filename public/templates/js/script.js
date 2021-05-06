$('#btnLogin').click(function () {
    $.ajax({
        url: "blocks/formlogin.php",
        type: 'GET',
        success: function (res) {
            $('#loginModal').modal('show')
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
        }  
    });  
});  
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


