<?php
if (!isset($_GET["id"])) {
    header("location:index.php?p=issuedbook_detail-list");
    exit();
} else {
    $id = $_GET["id"];
    $old = getDataIssuedBookDetailByID($conn, $id);
    if (isset($_POST["edit"])) {
        $errors = array();
        if (empty($_POST["id_issued"])) {
            $errors[] = "<li>Vui lòng nhập mã mượn</li>";
        }
        if (!isset($_POST["isbn"])){
            $errors[] = "<li>Vui lòng nhập ISBN</li>";
        } else {
            foreach($_POST["isbn"] as $isbn){
                if (checkBookIssued($conn, $isbn)) {
                    $errors[] = "<li>Cuốn sách mã " .$isbn. " đang được mượn</li>";
                    $errors[] = "<li>Vui lòng nhập ISBN khác</li>";
                }
            }
        }
        if (empty($errors)) {
            $data["id"] = $id;
            $data["id_issued"] = $_POST["id_issued"];
            $data["isbn"] = $_POST["isbn"];
            $data["return_status"] = $_POST["return_status"];

            editIssuedBookDetail($conn, $data);
            if ($data["isbn"] != $old["isbn"]){
                changeStatus($conn, $old["isbn"]);
            }
            header("location: index.php?p=issuedbook_detail-list");
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
                <label>Mã mượn</label>
                <input type="text" class="form-control" name="id_issued" placeholder="Nhập mã mượn" <?php if (isset($_POST["id_issued"])) echo 'value="' . $_POST["id_issued"] . '"';
                                                                                                        else echo 'value="' . $old["id_issued"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>ISBN</label>
                <input type="text" class="form-control" name="isbn" placeholder="Nhập ISBN" <?php if (isset($_POST["isbn"])) echo 'value="' . $_POST["isbn"] . '"';
                                                                                                        else echo 'value="' . $old["isbn"] . '"' ?>>
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