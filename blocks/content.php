<?php
    $stmt = $conn->prepare("SELECT count(isbn) as num FROM book");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (count($data) > 0) {
        $number = $data['num'];
    }
    $pages = ceil($number/12);
    $current_page = 1;
    if (isset($_GET['page'])){
        $current_page = $_GET['page'];
    }
    $index = ($current_page - 1) * 12; 
    $st = $conn->prepare("SELECT * FROM book LIMIT ".$index.', 12');
    $st->execute();
    $books = $st->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
        <h1>Sách mới cập nhật</h1>
        <div class="book-group">
            <?php
                if (count($books) % 12 != 1 && $current_page != $pages) {
            ?>
            <div class="row">
                <?php foreach($books as $book){?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="card card-book mb-3">
                        <img class="card-img-top" src="admin/public/images/books/<?php echo $book["image"] ?>"
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
                        <img class="card-img-top" src="admin/public/images/books/<?php echo $book["image"] ?>"
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
    <div class="page">
        <ul class="pagination">
            <?php
                for ($i = 1  ; $i <= $pages; $i++){
                    if ($i != $current_page)
                        echo '<li><a style="border: 1px solid black; padding: 5px; margin-right: 5px" href="index.php?page='.$i.'">'.$i.'</a></li>';
                    else
                        echo '<li><a style="font-weight: bold; color: red; border: 1px solid black; padding: 5px; margin-right: 5px" href="index.php?page='.$i.'">'.$i.'</a></li>';
                }
            ?>
        </ul>
    </div>
</div>