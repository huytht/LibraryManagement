<?php
//Create new book
function createBook($conn, $data){
    $stmt = $conn->prepare("INSERT INTO book (isbn, name, subcategories, image, author_id, price, reg_date, updation_date, shelf_id, description) VALUES(:isbn, :name, :subcategories, :image, :author_id, :price, :reg_date, :updation_date, :shelf_id, :description)");
    $stmt->bindParam(":isbn", $data["isbn"], PDO::PARAM_INT);
    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
    $stmt->bindParam(":subcategories", $data["subcategories"], PDO::PARAM_STR);
    $stmt->bindParam(":price", $data["price"], PDO::PARAM_INT);
    $stmt->bindParam(":reg_date", $data["reg_date"], PDO::PARAM_INT);
    $stmt->bindParam(":updation_date", $data["updation_date"], PDO::PARAM_INT);
    $stmt->bindParam(":author_id", $data["author_id"], PDO::PARAM_INT);
    $stmt->bindParam(":shelf_id", $data["shelf_id"], PDO::PARAM_INT);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

    $stmt->execute();
}

//Check ISBN Exist
function checkISBNExist($conn, $data){
    $stmt = $conn->prepare("SELECT * FROM book WHERE isbn = :isbn");
    $stmt->bindParam(":isbn", $data["isbn"], PDO::PARAM_INT);
    $stmt->execute();

    $count = $stmt->rowCount();
    if ($count != 0) {
        return true;
    }
    return false;
}

//get books list
function getDataBookList($conn){
    $stmt = $conn->prepare("SELECT * FROM book");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

//get book by isbn
function getBookByISBN($conn, $isbn){
    $stmt = $conn->prepare("SELECT * FROM book WHERE isbn = :isbn");
    $stmt->bindParam(":isbn", $isbn, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

//Edit book no img
function editBookNoImg($conn, $data){
    $stmt = $conn->prepare("UPDATE book SET name = :name, subcategories = :subcategories, author_id = :author_id, price = :price, updation_date = :updation_date, shelf_id = :shelf_id, description = :description, status = :status WHERE isbn = :isbn");
    $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
    $stmt->bindParam(":isbn", $data["isbn"], PDO::PARAM_INT);
    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":subcategories", $data["subcategories"], PDO::PARAM_STR);
    $stmt->bindParam(":price", $data["price"], PDO::PARAM_INT);
    $stmt->bindParam(":updation_date", $data["updation_date"], PDO::PARAM_INT);
    $stmt->bindParam(":author_id", $data["author_id"], PDO::PARAM_INT);
    $stmt->bindParam(":shelf_id", $data["shelf_id"], PDO::PARAM_INT);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

    $stmt->execute();
}
//Edit book
function editBook($conn, $data){
    $stmt = $conn->prepare("UPDATE book SET name = :name, subcategories = :subcategories, image = :image, author_id = :author_id, price = :price, updation_date = :updation_date, shelf_id = :shelf_id, description = :description, status = :status WHERE isbn = :isbn");
    $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
    $stmt->bindParam(":isbn", $data["isbn"], PDO::PARAM_INT);
    $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
    $stmt->bindParam(":subcategories", $data["subcategories"], PDO::PARAM_STR);
    $stmt->bindParam(":price", $data["price"], PDO::PARAM_INT);
    $stmt->bindParam(":updation_date", $data["updation_date"], PDO::PARAM_INT);
    $stmt->bindParam(":author_id", $data["author_id"], PDO::PARAM_INT);
    $stmt->bindParam(":shelf_id", $data["shelf_id"], PDO::PARAM_INT);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

    $stmt->execute();
}
//change status true
function changeStatus($conn, $isbn){
    $stmt = $conn->prepare("UPDATE book SET status = 1 WHERE isbn = :isbn");
    $stmt->bindParam(":isbn", $isbn, PDO::PARAM_INT);
    $stmt->execute();
}
//set status
function setStatus($conn, $isbn, $status){
    $stmt = $conn->prepare("UPDATE book SET status = :status WHERE isbn = :isbn");
    $stmt->bindParam(":isbn", $isbn, PDO::PARAM_INT);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    $stmt->execute();
}
//Check ISBN Exist for edit
function checkISBNExistForEdit($conn, $name, $isbn){
    $stmt = $conn->prepare("SELECT * FROM book WHERE name = :name AND isbn != :isbn");
    $stmt->bindParam(":isbn", $isbn, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->rowCount();
    if ($count >= 1) {
        return false;
    }
    return true;
}
//Delete book
function deleteBook($conn, $isbn){
    $stmt = $conn->prepare("DELETE FROM book WHERE isbn = :isbn");
    $stmt->bindParam(":isbn", $isbn, PDO::PARAM_INT);
    $stmt->execute();
}
//Find related book by subcate
function findRelatedBook($conn, $id){
    $tmp = "'".'"'.$id.'"'."'";
    $stmt = $conn->prepare("SELECT * FROM book WHERE JSON_CONTAINS(subcategories, $tmp)");
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
