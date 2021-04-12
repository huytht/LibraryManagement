<?php
if (isset($_POST["create"])) {
    $errors = array();
    $data["username"] = $_POST["username"];
    if (empty($_POST["fullname"])) {
        $errors[] = "<li>Vui lòng nhập họ và tên </li>";
    }
    if (empty($_POST["email"])) {
        $errors[] = "<li>Vui lòng nhập email</li>";
    }
    if (empty($_POST["username"])) {
        $errors[] = "<li>Vui lòng nhập tên tài khoản</li>";
    }
    if (checkAdminExist($conn, $data)) {
        $errors[] = "<li>Tài khoản đã tồn tại</li>";
    }
    if (empty($errors)) {
        $data["fullname"] = $_POST["fullname"];
        $data["email"] = $_POST["email"];
        $data["password"] = "Abcd@1234";
        $data["status"] = $_POST["status"];

        createAdminAccount($conn, $data);
        header("location: index.php?p=admin-list");
        exit();
       
    } else
?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        <?php foreach ($errors as $error) {
            echo $error;
        } ?>
    </div>
<?php } ?>
<form role="form" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tạo tài khoản admin</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" class="form-control" name="fullname" placeholder="Nhập họ và tên" <?php if (isset($_POST["fullname"])) echo 'value="' . $_POST["fullname"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Nhập email" <?php if (isset($_POST["email"])) echo 'value="' . $_POST["email"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Nhập tên tài khoản" <?php if (isset($_POST["username"])) echo 'value="' . $_POST["username"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-primary">Tạo tài khoản</button>
        </div>
        <!-- /.card-footer-->
    </div>
</form>