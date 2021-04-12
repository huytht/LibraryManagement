<?php
	session_start();
	ob_start();
	include '../library/config.php';
	include '../library/connect.php';
	include 'models/author.php';
	include 'models/category.php';
	include 'models/book.php';
	include 'models/subcategory.php';
	include 'models/shelf_details.php';
	include 'models/dashboard.php';
	include 'models/student.php';
	include 'models/issuedbook.php';
	include 'models/admin.php';
	if (empty($_SESSION['username'])) {
		header('location: login.php');
		exit();
	} else {
?>
<!doctype html>
<html>

<head>
    <?php include "blocks/head.php" ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar	-->
        <?php include "blocks/navbar.php"?>
        <!-- Navbar	-->

        <!-- Content -->
        <div class="content-wrapper">
            <?php include "blocks/content.php"?>
            <?php
				if (isset($_GET["p"])) {
					$p = $_GET["p"];
					switch ($p) {
						//book
						case 'book-list':
							include 'modules/book/list.php';
							break;
						case 'book-create':
							include 'modules/book/create.php';
							break;
						case 'book-update':
							include 'modules/book/update.php';
							break;
						case 'book-delete':
							include 'modules/book/delete.php';
							break;
						//author
						case 'author-list':
							include 'modules/author/list.php';
							break;
						case 'author-create':
							include 'modules/author/create.php';
							break;
						case 'author-update':
							include 'modules/author/update.php';
							break;
						case 'author-delete':
							include 'modules/author/delete.php';
							break;
						//category
						case 'category-list':
							include 'modules/category/list.php';
							break;
						case 'category-create':
							include 'modules/category/create.php';
							break;
						case 'category-update':
							include 'modules/category/update.php';
							break;
						case 'category-delete':
							include 'modules/category/delete.php';
							break;
						//student
						case 'student-list':
							include 'modules/student/list.php';
							break;
						case 'student-create':
							include 'modules/student/create.php';
							break;
						case 'student-update':
							include 'modules/student/update.php';
							break;
						case 'student-delete':
							include 'modules/student/delete.php';
							break;
						//issuedbook
						case 'issuedbook-list':
							include 'modules/issuedbook/list.php';
							break;
						case 'issuedbook-create':
							include 'modules/issuedbook/create.php';
							break;
						case 'issuedbook-update':
							include 'modules/issuedbook/update.php';
							break;
						case 'issuedbook-delete':
							include 'modules/issuedbook/delete.php';
							break;
						//subcategory
						case 'subcategory-list':
							include 'modules/subcategory/list.php';
							break;
						case 'subcategory-create':
							include 'modules/subcategory/create.php';
							break;
						case 'subcategory-update':
							include 'modules/subcategory/update.php';
							break;
						case 'subcategory-delete':
							include 'modules/subcategory/delete.php';
							break;
						//shelf_details
						case 'shelf_details-list':
							include 'modules/shelf_details/list.php';
							break;
						case 'shelf_details-create':
							include 'modules/shelf_details/create.php';
							break;
						case 'shelf_details-update':
							include 'modules/shelf_details/update.php';
							break;
						case 'shelf_details-delete':
							include 'modules/shelf_details/delete.php';
							break;
						//admin
						case 'admin-list':
							include 'modules/admin/list.php';
							break;
						case 'admin-create':
							include 'modules/admin/create.php';
							break;
						case 'admin-update':
							include 'modules/admin/update.php';
							break;
						case 'admin-delete':
							include 'modules/admin/delete.php';
							break;
						//default
						default: include 'modules/dashboard/index.php';
					}
				} else {
					include 'modules/dashboard/index.php';
				}
			?>

        </div>
        <!-- Content -->

        <!-- Footer -->
        <?php include "blocks/footer.php" ?>
        <!-- Footer -->

        <!-- Control Sidebar -->
        <?php include "blocks/control_sidebar.php"?>
        <!-- Control Sidebar -->
    </div>
    <?php include "blocks/foot.php"; ?>
</body>

</html>
<?php
	}
?>