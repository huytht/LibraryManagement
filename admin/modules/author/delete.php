<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    deleteAuthor($conn, $id);
    header('location: index.php?p=author-list');
    exit();
} else{
    header('location: index.php?p=author-list');
    exit();
}

?>