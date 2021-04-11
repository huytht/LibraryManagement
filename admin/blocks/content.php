<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <ol class="breadcrumb float-sm-left">
                    <li class="fas fa-none"><a href="index.php">Home &nbsp;</a></li>

                    <?php
                    if (isset($_GET["p"])){
                        $p = $_GET["p"];
                        $arr = explode('-', $p);
                    ?>
                    <li class="fas fa-angle-right"><a href="index.php?p=<?php echo $arr[0]?>-list"><?php echo " ". ucfirst($arr[0]) ?></a></li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
