<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="row">
            <?php
                $data = getTableList($conn);
                foreach($data as $tab) {
                    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
            ?>
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box" style="background-color: <?php echo $color?>;">
                    <div class="inner">
                        <h3> <?php  echo $tab["TABLE_ROWS"]?></h3>
                        <p> <?php echo strtoupper($tab["TABLE_NAME"]) ?> </p>
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