<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách các cuốn sách</h3>
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
                    <th>Tên sách</th>
                    <th>Thể loại</th>
                    <th>Hình ảnh</th>
                    <th>Tác giả</th>
                    <th>Giá</th>
                    <th>Kệ sách</th>
                    <th>Ngày nhập</th>
                    <th>Ngày cập nhật</th>
                    <th>Trạng thái</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = getDataBookList($conn);
                $stt = 0;
                foreach ($data as $item) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item["isbn"] ?></td>
                        <td><?php echo $item["name"] ?></td>
                        <td><?php
                            foreach (json_decode($item["subcategories"]) as $key => $sub) {
                                if ($key != count(json_decode($item["subcategories"])) - 1)
                                    echo getSubCategoryById($conn, $sub)["name"] . " - ";
                                else
                                    echo getSubCategoryById($conn, $sub)["name"];
                            }
                            ?>
                        </td>
                        <td><?php echo "<img src=public/images/books/" . $item["image"] . " width=50px height=50px>" ?></td>
                        <td><?php echo getAuthorById($conn, $item["author_id"])["fullname"]; ?></td>
                        <td><?php echo $item["price"] ?></td>
                        <?php
                        $shelf = getShelfById($conn, $item["shelf_id"]);
                        ?>
                        <td><?php echo "Kệ số " . $shelf["shelf_no"] . " - Tầng " . $shelf["floor_no"] ?></td>
                        <td><?php echo date('d/m/Y - H:i:s', $item["reg_date"]) ?></td>
                        <td><?php echo date('d/m/Y - H:i:s', $item["updation_date"]) ?></td>
                        <td><?php if ($item["status"] == 1) echo "Enable"; else echo "Disable";  ?></td>
                        <td><a href="index.php?p=book-update&isbn=<?php echo $item["isbn"] ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return acceptDelete('Do you really want to delete this book?')" href="index.php?p=book-delete&isbn=<?php echo $item["isbn"] ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <a href="index.php?p=book-create"><button type="submit" name="create" class="btn btn-primary">Tạo sách mới</button><a>
    </div>
    <!-- /.card-footer-->
</div>