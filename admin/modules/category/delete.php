<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    
    deleteCategory($conn, $id);
    header('location: index.php?p=category-list');
    exit();
} else{
    header('location: index.php?p=category-list');
    exit();
}

?>