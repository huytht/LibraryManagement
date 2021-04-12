<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    
    deleteAccountAdmin($conn, $id);
    header('location: index.php?p=admin-list');
    exit();
} else{
    header('location: index.php?p=admin-list');
    exit();
}

?>