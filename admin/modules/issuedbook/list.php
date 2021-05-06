<?php
    if (isset($_REQUEST["id"])){
        //update issue book
        $stmt = $conn->prepare("UPDATE issuedbook SET return_status = :return_status WHERE id = :id");
        $stmt->bindParam(":return_status", $_REQUEST["status"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $_REQUEST["id"], PDO::PARAM_INT);
        $stmt->execute();
        //update issuedbook_detail
        $st = $conn->prepare("UPDATE issuedbook_detail SET return_status = :return_status WHERE id_issued = :id");
        $st->bindParam(":return_status", $_REQUEST["status"], PDO::PARAM_INT);
        $st->bindParam(":id", $_REQUEST["id"], PDO::PARAM_INT);
        $st->execute();
        //update book
        $stm = $conn->prepare("UPDATE book SET status = :status WHERE isbn = :isbn");
        $stm->bindParam(":isbn", getDataIssuedBookDetailByID($conn, $_REQUEST["id"])["isbn"], PDO::PARAM_INT);
        $stm->bindParam(":status", $_REQUEST["status"], PDO::PARAM_INT);
        $stm->execute();
    }
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách thông tin mượn sách</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>

    <div class="card-body">
        <form action="" method="post">
            <table id="dataTable" class="table table-bordered table-hover nowrap" style="text-align: center;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã mượn</th>
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
                    getFineValue($conn, $item["id"]);
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item["id"] ?></td>
                        <td><?php echo $item["student_id"] ?></td>
                        <td><?php echo date('d/m/Y', $item["issues_date"]) ?></td>
                        <td><?php echo date('d/m/Y', $item["return_date"]) ?></td>
                        <td><input data-id="<?php echo $item["id"]?>" type="checkbox" name="chkStatus"
                                <?php if ($item["return_status"] == 1) echo "checked"; else echo "";  ?> /></td>
                        <td><?php echo $item["fine"]?></td>
                        <td><a href="index.php?p=issuedbook-update&id=<?php echo $item["id"] ?>"><i
                                    class="fa fa-edit"></i></a></td>
                        <td><a onclick="return acceptDelete('Do you really want to delete this issue detail?')"
                                href="index.php?p=issuedbook-delete&id=<?php echo $item["id"] ?>"><i
                                    class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>

    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <a href="index.php?p=issuedbook-create"><button type="submit" name="create" class="btn btn-primary">Tạo thông
                tin mượn sách</button><a>
    </div>
    <!-- /.card-footer-->
</div>