<?php 
    ob_start();
    session_start();
    include "library/config.php";
    include "library/connect.php";
    include "admin/models/book.php";
    include "admin/models/author.php";
    include "admin/models/student.php";
    include "admin/models/category.php";
    include "admin/models/subcategory.php";
?>
<!DOCTYPE html>
<html>

<head>
    <?php
        include "blocks/header.php";
    ?>
</head>

<body>
    <!-- smenu -->
    <?php
        include "blocks/menu.php";
    ?>
    <!-- emenu -->
    <!-- sslide -->
    <?php
        include "blocks/slide.php";
    ?>
    <!-- eslide -->
    <!-- Content -->
    <?php
        if (isset($_GET["p"])) {
            $p = $_GET["p"];
            switch ($p) {
                case 'personal-info':
                    include 'pages/personal_Info.php';
                    break;
                case 'category':
                    include 'pages/category.php';
                    break;
                case 'history-issuedbook':
                    include 'pages/historyIssuedBook.php';
                    break;
                case 'detail':
                    include 'pages/detail.php';
                    break;
                case 'search':
                    include 'pages/search.php';
                    break;
                default:
                    include 'blocks/content.php';
            }
        } else {
            include 'blocks/content.php';
        }
    ?>
    <!-- /Content -->
    <!-- footer -->
    <?php
        include "blocks/footer.php";
    ?>
    <!-- /footer -->
</body>
<?php
    include 'blocks/foot.php';
?>
</html>