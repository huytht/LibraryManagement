<?php
  if (isset($_POST["logout"])) {
    session_destroy();
    header('location: login.php');
    exit();
  }
?>
<form action="" method="post">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <img src="public/images/images/logo.PNG" width="100px" height="30px" alt="">
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <div class="btn-group">
                    <button type="button" class="btn btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <?php
                          echo $_SESSION['username'];
                        ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Thông tin tài khoản</a>
                        <div class="dropdown-divider"></div>
                        <input type="submit" class="dropdown-item" name="logout" value="Đăng xuất">
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</form>