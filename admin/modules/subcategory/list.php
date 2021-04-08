<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách thể loại</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>

    <div class="card-body">
        <table id="dataTable" class="table table-bordered table-hover nowrap" style="text-align: center;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên thể loại</th>
                    <th>Loại thể loại</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = getSubCategoryList($conn);
                $stt = 0;
                foreach ($data as $item) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item["name"] ?></td>
                        <td><?php echo getDataCategoryById($conn, $item["category_id"])["name"]; ?></td>
                        <td><a href="index.php?p=subcategory-update&id=<?php echo $item["id"] ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return acceptDelete('Do you really want to delete this subcategory?')" href="index.php?p=subcategory-delete&id=<?php echo $item["id"] ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <a href="index.php?p=subcategory-create"><button type="submit" name="create" class="btn btn-primary">Tạo thể loại mới</button><a>
    </div>
    <!-- /.card-footer-->
</div>