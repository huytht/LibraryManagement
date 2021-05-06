<div class="container">
    <div class="row mt-5">
    <h1>Sách mới cập nhật</h1>  
        <div class="book-group">
            <div class="row">
                <?php foreach(getDataBookList($conn) as $book){?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="card card-book mb-3">
                        <img class="card-img-top" src="admin/public/images/books/<?php echo $book["image"] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title book-title"><?php echo $book["name"]?></h5>
                            <a class="btn btn-outline-info btn-detail" href="index.php?p=detail&isbn=<?php echo $book["isbn"]?>"> Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>