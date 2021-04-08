<?php
    if (isset($_POST["create"])) {
        $errors = array();
        $data["fullname"] = $_POST["fullname"];
        $data["description"] = $_POST["description"];

        if (empty($_POST["fullname"])) {
            $errors[] = "<li>Vui lòng nhập tên tác giả</li>";
        }
        if (empty($errors)) {
            createAuthor($conn, $data);
            header("location: index.php?p=author-list");
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
            <h3 class="card-title">Tạo tác giả mới</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Tên tác giả</label>
                <input type="text" class="form-control" name="fullname" placeholder="Nhập tên tác giả" 
                <?php if (isset($_POST["fullname"])) echo 'value="'.$_POST["fullname"].'"' ?>>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="description" placeholder="Nhập mô tả"></textarea>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-primary">Tạo tác giả</button>
        </div>
        <!-- /.card-footer-->
    </div>
</form>