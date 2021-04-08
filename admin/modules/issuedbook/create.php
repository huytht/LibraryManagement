<?php
if (isset($_POST["create"])) {
    $errors = array();
    $data["isbn"] = $_POST["isbn"];
    if (empty($_POST["isbn"])) {
        $errors[] = "<li>Vui lòng nhập ISBN</li>";
    }
    if (empty($_POST["student_id"])) {
        $errors[] = "<li>Vui lòng nhập MSSV</li>";
    }
    if (empty($_POST["issues_date"])) {
        $errors[] = "<li>Vui lòng nhập ngày mượn</li>";
    }
    if (empty($_POST["return_date"])) {
        $errors[] = "<li>Vui lòng nhập ngày trả</li>";
    }
    if (strtotime($_POST["return_date"]) - strtotime($_POST["issues_date"]) > 1209600){
        $errors[] = "<li>Thời gian mượn không vượt quá 2 tuần</li>";
    }
    if ($_POST["return_date"] < $_POST["issues_date"]){
        $errors[] = "<li>Ngày trả phải sau ngày mượn</li>";
    }
    if (checkBookIssued($conn, $data["isbn"])) {
        $errors[] = "<li>Cuốn sách mã " .$data["isbn"]. " đang được mượn</li>";
        $errors[] = "<li>Vui lòng nhập ISBN khác</li>";
    }
    if (empty($errors)) {
        $data["student_id"] = $_POST["student_id"];
        $data["issues_date"] = strtotime($_POST["issues_date"]);
        $data["return_date"] = strtotime($_POST["return_date"]);

        createIssuedBookDetail($conn, $data);
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
<?php } ?>
<form role="form" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tạo thông tin mượn sách</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>ISBN</label>
                <input type="text" class="form-control" name="isbn" placeholder="Nhập isbn" <?php if (isset($_POST["isbn"])) echo 'value="' . $_POST["isbn"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Mã số sinh viên</label>
                <input type="text" class="form-control" name="student_id" placeholder="Nhập mã số sinh viên" <?php if (isset($_POST["student_id"])) echo 'value="' . $_POST["student_id"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Ngày mượn</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input name="issues_date" type="text" <?php if (isset($_POST["issues_date"])) echo 'value="' . $_POST["issues_date"] . '"' ?> class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                </div>
            </div>
            <div class="form-group">
                <label>Ngày trả</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input name="return_date" type="text"  <?php if (isset($_POST["return_date"])) echo 'value="' . $_POST["return_date"] . '"' ?> class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-primary">Tạo thông tin mượn sách</button>
        </div>
        <!-- /.card-footer-->
    </div>
</form>