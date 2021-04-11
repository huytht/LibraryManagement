<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    
    deleteAccountStudent($conn, $id);
    header('location: index.php?p=student-list');
    exit();
} else{
    header('location: index.php?p=student-list');
    exit();
}

?>