<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    $count = 0;
    foreach(getDataIssuedBookDetailByIdIssued($conn, $id) as $data) {
        if ($data["return_status"] != 0){
            $count++;
        } else 
            break;
    }
    if ($count == count(getDataIssuedBookDetailByIdIssued($conn, $id))){
        deleteIssuedBook($conn, $id);
        deleteIssuedBookDetailByIdIssued($conn, $id);
    } else {
        echo '<script> alert("Sách phải được trả hết mới được xóa!!!") </script>';
    }
    header('location: index.php?p=issuedbook-list');
    exit();
} else{
    header('location: index.php?p=issuedbook-list');
    exit();
}

?>