<?php
if (!isset($_GET["id"])) {
    header("location:index.php?p=student-list");
    exit();
} else {
    $id = $_GET["id"];
    $old = getDataStudentById($conn, $id);
    if (isset($_POST["edit"])) {
        $errors = array();
        $data["id"] = $id;
    if (empty($_POST["fullname"])) {
        $errors[] = "<li>Vui lòng nhập họ và tên sinh viên</li>";
    }
    if (empty($_POST["id"])) {
        $errors[] = "<li>Vui lòng nhập MSSV</li>";
    }
    if (empty($_POST["email"])) {
        $errors[] = "<li>Vui lòng nhập email</li>";
    }
    if (empty($_POST["phone"])) {
        $errors[] = "<li>Vui lòng nhập SĐT</li>";
    }

    if (empty($errors)) {
        $data["fullname"] = $_POST["fullname"];
        $data["email"] = $_POST["email"];
        $data["phone"] = $_POST["phone"];
        $data["updation_date"] = time();
        $data["status"] = $_POST["status"];

        editStudentDetail($conn, $data);
        header("location: index.php?p=student-list");
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
<?php }
} ?>
<form role="form" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cập nhật thông tin</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Mã số sinh viên</label>
                <input type="text" class="form-control" name="id" placeholder="Nhập mã số sinh viên" <?php if (isset($_POST["id"])) echo 'value="' . $_POST["id"] . '"';
                                                                                                        else echo 'value="' . $old["id"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" class="form-control" name="fullname" placeholder="Nhập họ và tên" <?php if (isset($_POST["fullname"])) echo 'value="' . $_POST["fullname"] . '"';
                                                                                                        else echo 'value="' . $old["fullname"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Nhập email" <?php if (isset($_POST["email"])) echo 'value="' . $_POST["email"] . '"';
                                                                                                        else echo 'value="' . $old["email"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" <?php if (isset($_POST["phone"])) echo 'value="' . $_POST["phone"] . '"';
                                                                                                        else echo 'value="' . $old["phone"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <select name="status" class="form-control">
                        <option value="1"
                        <?php if ($old["status"] == 1)
                                echo "selected";
                        ?>
                        >Enable</option>
                        <option value="0"
                        <?php if ($old["status"] == 0)
                                echo "selected";
                        ?>
                        >Disable</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="edit" class="btn btn-primary">Cập nhật</button>
        </div>
        <!-- /.card-footer-->
    </div>
</form>