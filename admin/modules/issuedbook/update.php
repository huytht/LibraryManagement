<?php
if (!isset($_GET["id"])) {
    header("location:index.php?p=issuedbook-list");
    exit();
} else {
    $id = $_GET["id"];
    $old = getDataIssuedBookById($conn, $id);
    if (isset($_POST["edit"])) {
        $errors = array();
        if (empty($_POST["student_id"])) {
            $errors[] = "<li>Vui lòng nhập MSSV</li>";
        }
        if (empty($_POST["issues_date"])) {
            $errors[] = "<li>Vui lòng nhập ngày mượn</li>";
        }
        if (empty($_POST["return_date"])) {
            $errors[] = "<li>Vui lòng nhập ngày trả</li>";
        }
        if (strtotime($_POST["return_date"]) - strtotime($_POST["issues_date"]) > 1209600) {
            $errors[] = "<li>Thời gian mượn không vượt quá 2 tuần</li>";
        }
        if ($_POST["return_date"] < $_POST["issues_date"]) {
            $errors[] = "<li>Ngày trả phải sau ngày mượn</li>";
        }
        if (empty($errors)) {
            $data["id"] = $id;
            $data["student_id"] = $_POST["student_id"];
            $data["issues_date"] = strtotime($_POST["issues_date"]);
            $data["return_date"] = strtotime($_POST["return_date"]);
            $data["return_status"] = $_POST["return_status"];

            editIssuedBook($conn, $data);
            header("location: index.php?p=issuedbook-list");
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
                <input type="text" class="form-control" name="student_id" placeholder="Nhập mã số sinh viên" <?php if (isset($_POST["student_id"])) echo 'value="' . $_POST["student_id"] . '"';
                                                                                                                else echo 'value="' . $old["student_id"] . '"' ?>>
            </div>

            <div class="form-group">
                <label>Ngày mượn</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input name="issues_date" <?php if (isset($_POST["issues_date"])) echo 'value="' . $_POST["issues_date"] . '"';
                                                else echo 'value="' . date('m/d/Y', $old["issues_date"]) . '"' ?> type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                </div>
            </div>
            <div class="form-group">
                <label>Ngày trả</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input name="return_date" <?php if (isset($_POST["return_date"])) echo 'value="' . $_POST["return_date"] . '"';
                                                else echo 'value="' . date('m/d/Y', $old["return_date"]) . '"' ?> type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                </div>
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <select name="return_status" class="form-control">
                        <option value="1"
                        <?php if ($old["return_status"] == 1)
                                echo "selected";
                        ?>
                        >Enable</option>
                        <option value="0"
                        <?php if ($old["return_status"] == 0)
                                echo "selected";
                        ?>
                        >Disable</option>
                </select>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" name="edit" class="btn btn-primary">Cập nhật thông tin</button>
    </div>
    <!-- /.card-footer-->
    </div>
</form>