<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách tài khoản sinh viên</h3>
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
                    <th>ISBN</th>
                    <th>MSSV</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                    <th>Tiền phạt</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = getDataIssuedBookList($conn);
                $stt = 0;
                foreach ($data as $item) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item["isbn"] ?></td>
                        <td><?php echo $item["student_id"] ?></td>
                        <td><?php echo date('d/m/Y', $item["issues_date"]) ?></td>
                        <td><?php echo date('d/m/Y', $item["return_date"]) ?></td>
                        <td><?php if ($item["return_status"] == 1) echo "True"; else echo "False";  ?></td>
                        <td><?php echo $item["fine"] ?></td>
                        <td><a href="index.php?p=issuedbook-update&id=<?php echo $item["id"] ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return acceptDelete('Do you really want to delete this issue detail?')" href="index.php?p=issuedbook-delete&id=<?php echo $item["id"] ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <a href="index.php?p=issuedbook-create"><button type="submit" name="create" class="btn btn-primary">Tạo thông tin mượn sách</button><a>
    </div>
    <!-- /.card-footer-->
</div>