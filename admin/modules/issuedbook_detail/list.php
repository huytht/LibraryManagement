<?php
    if (isset($_REQUEST["id"])){
        //update issuedbook_detail
        $stmt = $conn->prepare("UPDATE issuedbook_detail SET return_status = :return_status WHERE id = :id");
        $stmt->bindParam(":return_status", $_REQUEST["status"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $_REQUEST["id"], PDO::PARAM_INT);
        $stmt->execute();
        //update book
        $st = $conn->prepare("UPDATE book SET status = :status WHERE isbn = :isbn");
        $st->bindParam(":isbn", getDataIssuedBookDetailByID($conn, $_REQUEST["id"])["isbn"], PDO::PARAM_STR);
        $st->bindParam(":status", $_REQUEST["status"], PDO::PARAM_INT);
        $st->execute();
        foreach(getDataIssuedBookDetailByIdIssued($conn, $_REQUEST["id"]) as $data) {
            setStatus($conn, $data["isbn"], $_REQUEST["status"]);
        }
    }
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách thông tin chi tiết mượn sách</h3>
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
                    <th>Mã mượn</th>
                    <th>ISBN</th>
                    <th>Trạng thái</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = getDataIssuedBookDetailList($conn);
                $stt = 0;
                foreach ($data as $item) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item["id_issued"] ?></td>
                        <td><?php echo $item["isbn"] ?></td>
                        <td><input data-id="<?php echo $item["id"]?>" type="checkbox" name="chkStatus"
                                <?php if ($item["return_status"] == 1) echo "checked"; else echo "";  ?> /></td>
                        <td><a href="index.php?p=issuedbook_detail-update&id=<?php echo $item["id"] ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return acceptDelete('Do you really want to delete this issue detail?')" href="index.php?p=issuedbook_detail-delete&id=<?php echo $item["id"] ?>"><i class="fa fa-trash"></i></a></td>
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