<style>

td.wide {
    word-break: break-word;
}
</style>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách tác giả</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>

    <div class="card-body">
        <table id="dataTable" class="table table-bordered table-hover" style="text-align: center;">
            <thead class="nowrap">
                <tr>
                    <th>ID</th>
                    <th>Tên tác giả</th>
                    <th>Mô tả</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = getAuthorList($conn);
                foreach ($data as $item) {
                ?>
                <tr>

                    <td style="width: 10%"><?php echo $item["id"] ?></td>
                    <td style="width: 20%"><?php echo $item["fullname"] ?></td>
                    <td style="width: 60%; word-break: break-word;" class="wide">
                        <?php echo $item["description"] ?>
                    </td>
                    </td>
                    <td><a href="index.php?p=author-update&id=<?php echo $item["id"] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td><a onclick="return acceptDelete('Do you really want to delete this Author?')"
                            href="index.php?p=author-delete&id=<?php echo $item["id"] ?>"><i
                                class="fa fa-trash"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <a href="index.php?p=author-create"><button type="submit" name="create" class="btn btn-primary">Thêm tác giả
                mới</button><a>
    </div>
    <!-- /.card-footer-->
</div>