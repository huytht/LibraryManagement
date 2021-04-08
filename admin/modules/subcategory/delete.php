<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    
    deleteSubCategory($conn, $id);
    header('location: index.php?p=subcategory-list');
    exit();
} else{
    header('location: index.php?p=subcategory-list');
    exit();
}

?>