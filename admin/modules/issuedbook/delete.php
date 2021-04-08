<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    
    deleteIssuedBook($conn, $id);
    header('location: index.php?p=issuedbook-list');
    exit();
} else{
    header('location: index.php?p=issuedbook-list');
    exit();
}

?>