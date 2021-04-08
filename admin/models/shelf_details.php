<?php
    //Create new shelf
    function createShelfDetails($conn, $data){
        $stmt = $conn->prepare("INSERT INTO shelf_details (shelf_no, floor_no) VALUES(:shelf_no, :floor_no)");
        $stmt->bindParam(":shelf_no", $data["shelf_no"], PDO::PARAM_STR);
        $stmt->bindParam(":floor_no", $data["floor_no"], PDO::PARAM_INT);
        $stmt->execute();
    }
    //get all shelf
    function getShelfList($conn){
        $stmt = $conn->prepare("SELECT * FROM shelf_details");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //get shelf by id
    function getShelfById($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM shelf_details WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
?>