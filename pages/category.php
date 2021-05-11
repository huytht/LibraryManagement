<?php
    $bookList = getDataBookList($conn);
    $title = "Tất cả thể loại";
    if (isset($_GET["id"])) {
        if ($_GET["id"] == "all"){
            $bookList = getDataBookList($conn);
            $title = "Tất cả thể loại";
            $number = count($bookList);
            $pages = ceil($number/12);
            $current_page = 1;
            if (isset($_GET['page'])){
                $current_page = $_GET['page'];
            }
            $index = ($current_page - 1) * 12; 
            $st = $conn->prepare("SELECT * FROM book LIMIT ".$index.', 12');
            $st->execute();
            $books = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $bookList = findRelatedBook($conn, $_GET["id"]);
            $title = getSubCategoryById($conn, $_GET["id"])["name"];
            $number = count($bookList);
            $pages = ceil($number/12);
            $current_page = 1;
            if (isset($_GET['page'])){
                $current_page = $_GET['page'];
            }
            $index = ($current_page - 1) * 12; 
            $books = findBook($conn, $_GET["id"], $index);
        }
    }
?>
<div id="main">
    <div class="main">
        <div class="left">
            <div class="topleft">
                <div class="Category">
                    <h2><?php echo $title?></h2>
                </div>
            </div>
            <div class="mainleft">
                <div class="container">
                    <div class="book-group">
                        <?php
                            if (count($books) % 12 != 1 && $current_page != $pages) {
                        ?>
                        <div class="row">
                            <?php foreach($books as $book){?>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="card card-book mb-3">
                                    <img class="card-img-top"
                                        src="admin/public/images/books/<?php echo $book["image"] ?>"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title book-title"><?php echo $book["name"]?></h5>
                                        <a class="btn btn-outline-info btn-detail"
                                            href="index.php?p=detail&isbn=<?php echo $book["isbn"]?>"> Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <?php
                            } else {
                        ?>
                        <div class="row row1">
                            <?php foreach($books as $book){?>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="card card-book mb-3">
                                    <img class="card-img-top"
                                        src="admin/public/images/books/<?php echo $book["image"] ?>"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title book-title"><?php echo $book["name"]?></h5>
                                        <a class="btn btn-outline-info btn-detail"
                                            href="index.php?p=detail&isbn=<?php echo $book["isbn"]?>"> Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="root">
                <p id="title"><b><i class="fas fa-bars"> </i>&nbsp;DANH SÁCH THỂ LOẠI</b></p>
                <ul class="submenu">
                    <li><a class="dropdown-item" href="index.php?p=category&id=all">Tất cả sách</a></li>
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
<div class="page">
    <ul class="pagination">
    <?php
        for ($i = 1  ; $i <= $pages; $i++){
            if ($i != $current_page)
                echo '<li><a style="border: 1px solid black; padding: 5px; margin-right: 5px" href="index.php?p=category&id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
            else
                echo '<li><a style="font-weight: bold; color: red; border: 1px solid black; padding: 5px; margin-right: 5px" href="index.php?p=category&id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
        }
    ?>
    </ul>
</div>