<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    deleteShelf($conn, $id);
    header('location: index.php?p=shelf_details-list');
    exit();
} else{
    header('location: index.php?p=shelf_details-list');
    exit();
}

?>
