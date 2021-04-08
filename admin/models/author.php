<?php
//Create new author
function createAuthor($conn, $data){
    $stmt = $conn->prepare("INSERT INTO author (fullname, description) VALUES(:fullname, :description)");
    $stmt->bindParam(":fullname", $data["fullname"], PDO::PARAM_INT);
    $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
    $stmt->execute();
}
//Get author list
function getAuthorList($conn){
    $stmt = $conn->prepare("SELECT * FROM author");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
//get author by id
function getAuthorById($conn, $id){
    $stmt = $conn->prepare("SELECT * FROM author WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
?> 
