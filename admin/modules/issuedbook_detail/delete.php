<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    
    if (getDataIssuedBookDetailByID($conn, $id)["return_status"] == 1){
        deleteIssuedBookDetail($conn, $id);
    } else {
        echo '<script> alert("Sách phải được trả mới được xóa!!!") </script>';
    }
    header('location: index.php?p=issuedbook_detail-list');
    exit();
} else{
    header('location: index.php?p=issuedbook_detail-list');
    exit();
}

?>