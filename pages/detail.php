<?php
    if (isset($_GET["isbn"])) {
        $book = getBookByISBN($conn, $_GET["isbn"]);
    }
?>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-8">
            <div class="card" id="detail">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active"><img class="card-img-top"
                                        src="admin/public/images/books/<?php echo $book['image']?>"
                                        alt="Card image cap">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-primary"><?php echo mb_strtoupper($book['name'])?></h3>
                            <p style="font-size: 20px;"><b>Tác giả:
                                </b><?php echo getAuthorById($conn,$book['author_id'])['fullname']?>
                            <p style="font-size: 20px;"><b>Tình trạng:
                                </b><?php if ($book["status"] == 0) echo "Đã mượn"; else echo "Còn";?></p>
                            <p style="font-size: 20px;"><b>Thể loại: </b>
                                <?php foreach (json_decode($book["subcategories"]) as $key => $sub) {
                                        if ($key != count(json_decode($book["subcategories"])) - 1)
                                            echo getSubCategoryById($conn, $sub)["name"] . " - ";
                                        else
                                            echo getSubCategoryById($conn, $sub)["name"];
                                        } 
                                    ?>
                            </p>
                            <p style="font-size: 20px;"><b>Giá trị: </b>
                                <span class="text-danger"><?php echo $book['price']?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-content">
        <h3 style="margin-top: 20px;" class="list-title">
            Nội dung 
            <a id="btnRD" style="cursor: pointer" style="margin: 0; border: none; background-color: white">
                <i class="fas fa-volume-up"></i>
            </a>
        </h3>
        <audio preload="none" src=""></audio>
        <p id="txtD" style="font-size: 20px;"><?php echo $book['description']?></p>
    </div>
    <h3>Sách liên quan</h3>
    <div class="container">
        <div class="row mt-5">
            <div class="book-group">
                <div class="row">
                    <?php
                        foreach (json_decode($book['subcategories']) as $val){
                            $books = findRelatedBook($conn, $val);
                            foreach($books as $bookRelated){
                                if (strcmp($bookRelated['name'], $book['name'])) {
                        ?>
                    <div class="col-mb-3">
                        <div style="width: 250px; height: 95%;" class="card card-book mb-3">
                            <img class="card-img-top"
                                src="admin/public/images/books/<?php echo $bookRelated["image"] ?>"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title book-title"><?php echo $bookRelated["name"]?></h5>
                                <a class="btn btn-outline-info btn-detail"
                                    href="index.php?p=detail&isbn=<?php echo $bookRelated["isbn"]?>"> Xem chi
                                    tiết</a>
                            </div>
                        </div>
                    </div>
                    <?php
                                } else continue;
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>