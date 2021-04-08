<?php
if (isset($_POST["create"])) {
    $errors = array();


    if (empty($_POST["name"])) {
        $errors[] = "<li>Vui lòng nhập tên thể loại</li>";
    }
    if (empty($errors)) {
        $data["name"] = $_POST["name"];
        $data["description"] = $_POST["description"];
        createCategory($conn, $data);
        header("location: index.php?p=category-list");
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
            <h3 class="card-title">Tạo thể loại mới</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Tên thể loại</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên thể loại" <?php if (isset($_POST["name"])) echo 'value="' . $_POST["name"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="description" placeholder="Nhập mô tả"></textarea>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-primary">Tạo thể loại</button>
        </div>
        <!-- /.card-footer-->
    </div>
</form>