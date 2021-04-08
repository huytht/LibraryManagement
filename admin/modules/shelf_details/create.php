<?php
    if (isset($_POST["create"])) {
        $errors = array();

        if (empty($_POST["shelf_no"])) {
            $errors[] = "<li>Vui lòng nhập số kệ</li>";
        }
        if (empty($_POST["floor_no"])) {
            $errors[] = "<li>Vui lòng nhập số tầng</li>";
        }
        if (empty($errors)) {
            $data["shelf_no"] = $_POST["shelf_no"];
            $data["floor_no"] = $_POST["floor_no"];
            createShelfDetails($conn, $data);
            header("location: index.php?p=shelf_details-list");
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
            <h3 class="card-title">Tạo thông tin kệ sách</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Kệ số</label>
                <input type="text" class="form-control" name="shelf_no" placeholder="Nhập số kệ" 
                <?php if (isset($_POST["shelf_no"])) echo 'value="'.$_POST["shelf_no"].'"' ?>>
            </div>
            <div class="form-group">
                <label>Tầng số</label>
                <input type="text" class="form-control" name="floor_no" placeholder="Nhập số tầng" 
                <?php if (isset($_POST["floor_no"])) echo 'value="'.$_POST["floor_no"].'"' ?>>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-primary">Tạo thông tin kệ sách</button>
        </div>
        <!-- /.card-footer-->
    </div>
</form>