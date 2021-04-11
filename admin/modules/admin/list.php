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
                    <th>MSSV</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Trạng thái</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = getDataStudentList($conn);
                $stt = 0;
                foreach ($data as $item) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item["id"] ?></td>
                        <td><?php echo $item["fullname"] ?></td>
                        <td><?php echo $item["email"] ?></td>
                        <td><?php echo $item["phone"] ?></td>
                        <td><?php echo date('d/m/Y - H:i:s', $item["reg_date"]) ?></td>
                        <td><?php echo date('d/m/Y - H:i:s', $item["updation_date"]) ?></td>
                        <td><?php if ($item["status"] == 1) echo "Enable"; else echo "Disable";  ?></td>
                        <td><a href="index.php?p=student-update&id=<?php echo $item["id"] ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return acceptDelete('Do you really want to delete this account?')" href="index.php?p=student-delete&id=<?php echo $item["id"] ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <a href="index.php?p=student-create"><button type="submit" name="create" class="btn btn-primary">Tạo tài khoản</button><a>
    </div>
    <!-- /.card-footer-->
</div>