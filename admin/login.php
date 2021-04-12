<?php
    session_start();
    include 'models/admin.php';
    include '../library/config.php';
	include '../library/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "blocks/head_login.php";
    ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php
        include "blocks/login_box.php";
        ?>
    </div>
    <?php
    include "blocks/foot_login.php";
    ?>
</body>

</html>