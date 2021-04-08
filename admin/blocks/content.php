<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <?php
                    if (isset($_GET["p"])){
                        $p = $_GET["p"];
                        $arr = explode('-', $p);
                    ?>
                    <li class="breadcrumb-item"><a href="index.php?p=<?php echo $arr[0]?>-list"><?php echo ucfirst($arr[0]) ?></a></li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
