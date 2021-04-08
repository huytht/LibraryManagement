<?php
    //Create new category
    function createCategory($conn, $data){
        $stmt = $conn->prepare("INSERT INTO category (name, description) VALUES(:name, :description)");
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->execute();
    }

    //Category List
    function getDataCategoryList($conn){
        $stmt = $conn->prepare("SELECT * FROM category");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Delete category
    function deleteCategory($conn, $id){
        $stmt = $conn->prepare("DELETE FROM category WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //get category by id
    function getDataCategoryById($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM category WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //update category
    function editCategoryDetail($conn, $data){
        $stmt = $conn->prepare("UPDATE category SET name = :name, description = :description WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

        $stmt->execute();
    }
?> 
