<?php 
if (isset($_GET["isbn"])){
    $isbn = $_GET["isbn"];
    
    $data = getBookByISBN($conn, $isbn);
    $data_image_path = "public/images/books/". $data["image"];
    if (file_exists($data_image_path)){
        unlink($data_image_path);
    }
    deleteBook($conn, $isbn);
    header('location: index.php?p=book-list');
    exit();
} else{
    header('location: index.php?p=book-list');
    exit();
}

?>