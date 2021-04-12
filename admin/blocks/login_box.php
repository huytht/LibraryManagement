<?php
    if (isset($_POST["login"])) {
        $errors = array();
        if (empty($_POST["username"])) {
            $errors[] = "<li>Vui lòng nhập tên tài khoản </li>";
        }
        if (empty($_POST["password"])) {
            $errors[] = "<li>Vui lòng nhập mật khẩu</li>";
        }
        if (!loginAdmin($conn, $_POST['username'], md5($_POST['password'])))
            $errors[] = "<li>Sai tài khoản hoặc mật khẩu</li>";
        if (empty($errors) && loginAdmin($conn, $_POST['username'], md5($_POST['password']))){
            $_SESSION['username'] = $_POST['username'];
            echo $_POST['username'];
            header('location: index.php');
            exit();
        } else {
            echo "<script>alert('<ul>". print_r($errors)."</ul>')</script>";
        }

    }
?>
<div class="login-logo">
    <a href="#"><b>Quản lí thư viện</b> </a>
</div>
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Đăng nhập</p>

        <form action="#" method="post">
            <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col">
                    <button type="submit" name="login" class="btn btn-primary btn-block">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- <p class="mb-1">
            <a href="forgot-password.html">Quên mật khẩu</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Đăng kí tài khoản mới</a>
        </p> -->
    </div>
    <!-- /.login-card-body -->
</div>