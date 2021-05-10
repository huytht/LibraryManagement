<?php
    if (!empty($_REQUEST["keyWord"])){
        $bookList = searchBook($conn, $_REQUEST["keyWord"]); 
?>
<div id="main">
    <div class="main">
        <div class="left">
            <div class="topleft">
                <div class="Category">
                    <h2><?php echo "Tìm truyện"?></h2>
                </div>
            </div>
            <div class="mainleft">
                <div class="container">
                    <div class="row mt-5">
                        <div class="book-group">
                            <div class="row">
                                <?php foreach($bookList as $book){?>
                                <div class="col-lg-4">
                                    <div class="card card-book mb-3">
                                        <img class="card-img-top"
                                            src="admin/public/images/books/<?php echo $book["image"] ?>" width="100%"
                                            height="100%">
                                        <div class="card-body">
                                            <h5 class="card-title book-title"><?php echo $book["name"]?></h5>
                                            <a class="btn btn-outline-info btn-detail"
                                                href="index.php?p=detail&isbn=<?php echo $book["isbn"]?>"> Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="root">
                <p id="title"><b><i class="fas fa-bars"> </i>&nbsp;DANH SÁCH THỂ LOẠI</b></p>
                <ul class="submenu">
                    <li><a href="index.php?p=category&id=all">Tất cả sách</a></li>
                    <?php
                        $categories = getDataCategoryList($conn);
                        foreach ($categories as $category) {
                    ?>
                    <?php
                        $subcategories = getSubCategoryListById($conn, $category["id"]);
                        foreach ($subcategories as $subcategory) {
                    ?>
                    <li>
                        <a class="dropdown-item" href="index.php?p=category&id=<?php echo $subcategory["id"]?>">
                        <?php echo $subcategory["name"] ?>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php } ?>
                </ul>
                </li>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>