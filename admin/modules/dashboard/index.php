<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="row">
            <?php
                $data = getTableList($conn);
                foreach($data as $tab) {
            ?>
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box" style="background-color: <?php switch($tab["TABLE_NAME"]){
                                case "book": 
                                    echo "#94909a";
                                    break; 
                                case "author": 
                                    echo "#d64d4e";
                                    break;
                                case "admin": 
                                    echo "#d3a2fb";
                                    break;
                                case "category":
                                    echo "#39fa25";
                                    break;
                                case "subcategory": 
                                    echo "#7883a4";
                                    break;
                                case "issuedbook": 
                                    echo "#9c0290";
                                    break;
                                case "issuedbook_detail": 
                                    echo "#9c0291";
                                    break;
                                case "shelf_details": 
                                    echo "#879956";
                                    break;
                                case "student": 
                                    echo "#b08c03";
                                    break;
                            } ?>">
                    <div class="inner">
                        <h3> <?php  echo $tab["TABLE_ROWS"]?></h3>
                        <p> <?php switch($tab["TABLE_NAME"]){
                                case "book": 
                                    echo "Sách";
                                    break; 
                                case "author": 
                                    echo "Tác giả";
                                    break;
                                case "admin": 
                                    echo "Admin";
                                    break;
                                case "category":
                                    echo "Loại thể loại";
                                    break;
                                case "subcategory": 
                                    echo "Thể loại";
                                    break;
                                case "issuedbook": 
                                    echo "Thông tin mượn sách";
                                    break;
                                case "issuedbook_detail": 
                                    echo "Thông tin chi tiết mượn sách";
                                    break;
                                case "shelf_details": 
                                    echo "Thông tin kệ sách";
                                    break;
                                case "student": 
                                    echo "Tài khoản người dùng";
                                    break;
                            } ?></p>
                    </div>
                    
                    <div class="icon">
                        <i class="fas fa-<?php 
                            switch($tab["TABLE_NAME"]){
                                case "book": 
                                    echo "book";
                                    break; 
                                case "author": 
                                    echo "user-edit";
                                    break;
                                case "admin": 
                                    echo "user-shield";
                                    break;
                                case "category":
                                case "subcategory": 
                                    echo "list";
                                    break;
                                case "issuedbook": 
                                case "issuedbook_detail": 
                                    echo "book-reader";
                                    break;
                                case "shelf_details": 
                                    echo "info";
                                    break;
                                case "student": 
                                    echo "user";
                                    break;
                            }
                        ?>">
                        </i>
                    </div>
                    <a href="index.php?p=<?php echo $tab["TABLE_NAME"] ?>-list" class="small-box-footer">
                        Xem thêm <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- /small card -->
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<!-- /.content -->