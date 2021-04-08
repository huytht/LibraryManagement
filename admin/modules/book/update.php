<?php
if (!isset($_GET["isbn"])) {
    header("location:index.php?p=book-list");
    exit();
} else {
    $isbn = $_GET["isbn"];
    $book = getBookByISBN($conn, $isbn);
    if (isset($_POST["edit"])) {
        $errors = array();
        if (empty($_POST["name"])) {
            $errors[] = "<li>Vui lòng nhập tên sách</li>";
        }
        if (empty($_POST["price"])) {
            $errors[] = "<li>Vui lòng nhập giá sách</li>";
        }
        if (!is_numeric($_POST["price"])) {
            $errors[] = "<li>Giá sách phải là chữ số</li>";
        }
        
        if (empty($errors)) {
            $data["isbn"] = $isbn;
            $data["name"] = $_POST["name"];
            $data["status"] = $_POST["status"];
            $data["author_id"] = $_POST["author_id"];
            $data["price"] = $_POST["price"];
            $data["updation_date"] = time();
            $data["shelf_id"] = $_POST["shelf_id"];
            $data["description"] = $_POST["description"];

            if (isset($_POST["cateGroup"])) {
                $arr = array();
                foreach ($_POST["cateGroup"] as $cate) {
                    $arr[] = $cate;
                }
                $data["subcategories"] = json_encode($arr);
                if (empty($_FILES["image"]["name"])) {
                    editBookNoImg($conn, $data);
                } else {
                    $data["image"] = time() . "-" . $_FILES["image"]["name"];
                    $data["image_tmp"] = $_FILES["image"]["tmp_name"];
                    editBook($conn, $data);
                    move_uploaded_file($data["image_tmp"], "public/images/books/" . $data["image"]);
                }
                header("location: index.php?p=book-list");
                exit();
            } else {
                $errors[] = "<li>Vui lòng chọn thể loại</li>";
            }
        } else
?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            <?php foreach ($errors as $error) {
            echo $error;
        } ?>
        </div>
<?php }
} ?>
<form role="form" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cập nhật</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>ISBN</label>
                <input disabled type="text" class="form-control" name="isbn" placeholder="Nhập ISBN" <?php if (isset($_POST["isbn"])) echo 'value="' . $_POST["isbn"] . '"'; else echo 'value="' . $book["isbn"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Tên sách</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sách" <?php if (isset($_POST["name"])) echo 'value="' . $_POST["name"] . '"'; else echo 'value="' . $book["name"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Hình ảnh hiện tại</label>
                <div>
                    <img src="public/images/books/<?php echo $book["image"]?>" width="100px">
                </div>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label>Thể loại</label>
                <div>
                    <select name="cateGroup[]" multiple id="cateGroup">
                        <?php
                        $categories = getDataCategoryList($conn);
                        foreach ($categories as $category) {
                        ?>
                            <optgroup label='<?php echo $category["name"] ?>'>
                                <?php
                                $subcategories = getSubCategoryListById($conn, $category["id"]);
                                foreach ($subcategories as $subcategory) {
                                ?>
                                    <option value="<?php echo $subcategory["id"] ?>"
                                    <?php
                                        foreach (json_decode($book["subcategories"]) as $cateID) 
                                            if ($subcategory["id"] == $cateID){
                                                echo 'selected';
                                                break;
                                            }
                                    ?>>
                                        <?php echo $subcategory["name"] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </optgroup>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Tác giả</label>
                <div>
                    <select id="author" name="author_id">
                        <?php
                        $author = getAuthorList($conn);
                        foreach ($author as $item) {
                        ?>
                            <option value="<?php echo $item["id"] ?>" <?php
                                                                        if (isset($_POST["author_id"]) && $_POST["author_id"] == $item["id"])
                                                                            echo 'selected';
                                                                        else if ($book["author_id"] == $item["id"])
                                                                                echo 'selected';
                                                                        ?>>
                                <?php echo $item["fullname"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá sách" <?php if (isset($_POST["price"])) echo 'value="' . $_POST["price"] . '"'; echo 'value="' . $book["price"] . '"' ?>>
            </div>
            <div class="form-group">
                <label>Kệ sách</label>
                <div>
                    <select id="shelf" name="shelf_id">
                        <?php
                        $shelf = getShelfList($conn);
                        foreach ($shelf as $item) {
                        ?>
                            <option value="<?php echo $item["id"] ?>" <?php
                                                                        if (isset($_POST["shelf_id"]) && $_POST["shelf_id"] == $item["id"]) {
                                                                            echo 'selected';
                                                                        } else if ($book["shelf_id"] == $item["id"])
                                                                                    echo 'selected';
                                                                        ?>> <?php echo "Kệ số " . $item["shelf_no"] . " - Tầng " . $item["floor_no"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả nội dung</label>
                <textarea class="form-control" name="description" placeholder="Nhập mô tả">
                    <?php if (isset($_POST["description"])) echo $_POST["description"]; else echo $book["description"]; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <select name="status" class="form-control">
                        <option value="1"
                        <?php if ($book["status"] == 1)
                                echo "selected";
                        ?>
                        >Enable</option>
                        <option value="0"
                        <?php if ($book["status"] == 0)
                                echo "selected";
                        ?>
                        >Disable</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="edit" class="btn btn-primary">Cập nhật sách</button>
        </div>
        <!-- /.card-footer-->
    </div>
</form>