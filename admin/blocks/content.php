<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <ol class="breadcrumb float-sm-left">
                    <li class="fas fa-none"><a href="index.php"><i class="fas fa-home"></i> &nbsp;</a></li>

                    <?php
                    if (isset($_GET["p"])){
                        $p = $_GET["p"];
                        $arr = explode('-', $p);
                    ?>
                    <li class="fas fa-angle-right"><a href="index.php?p=<?php echo $arr[0]?>-list"><?php switch($arr[0]){
                                case "book": 
                                    echo " Sách";
                                    break; 
                                case "author": 
                                    echo " Tác giả";
                                    break;
                                case "admin": 
                                    echo " Admin";
                                    break;
                                case "category":
                                    echo " Loại thể loại";
                                    break;
                                case "subcategory": 
                                    echo " Thể loại";
                                    break;
                                case "issuedbook": 
                                    echo " Thông tin mượn sách";
                                    break;
                                case "issuedbook_detail": 
                                    echo " Thông tin chi tiết mượn sách";
                                    break;
                                case "shelf_details": 
                                    echo " Thông tin kệ sách";
                                    break;
                                case "student": 
                                    echo " Tài khoản người dùng";
                                    break;
                            } ?> </a></li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>