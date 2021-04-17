<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách các kệ sách</h3>
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
                    <th>ID</th>
                    <th>Vị trí</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data =  getShelfList($conn);
                $stt = 0;
                foreach ($data as $item) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item["id"] ?></td>
                        
                        <?php
                        $shelf = getShelfById($conn, $item["id"]);
                        ?>
                        <td><?php echo "Kệ số " . $shelf["shelf_no"] . " - Tầng " . $shelf["floor_no"] ?></td>
                        
                        <td><a href="index.php?p=shelf_details-update&id=<?php echo $item["id"] ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return acceptDelete('Do you really want to delete this shelf?')" href="index.php?p=shelf_details-delete&id=<?php echo $item["id"] ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <a href="index.php?p=shelf_details-create"><button type="submit" name="create" class="btn btn-primary">Tạo kê sách mới</button><a>
    </div>
    <!-- /.card-footer-->
</div>
