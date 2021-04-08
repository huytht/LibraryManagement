<?php
    //Create new sub-category
    function createSubCategory($conn, $data){
        $stmt = $conn->prepare("INSERT INTO subcategory (name, category_id) VALUES(:name, :category_id)");
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":category_id", $data["category_id"], PDO::PARAM_INT);
        $stmt->execute();
    }
    //Get Sub-Category List by ID category
    function getSubCategoryListById($conn, $category_id){
        $stmt = $conn->prepare("SELECT * FROM subcategory WHERE category_id=:category_id");
        $stmt->bindParam(":category_id", $category_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //Get sub-category by id
    function getSubCategoryById($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM subcategory WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //Get Sub-Category List 
    function getSubCategoryList($conn){
        $stmt = $conn->prepare("SELECT * FROM subcategory");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //Delete sub-category
    function deleteSubCategory($conn, $id){
        $stmt = $conn->prepare("DELETE FROM subcategory WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    //update sub-category
    function editSubCategoryDetail($conn, $data){
        $stmt = $conn->prepare("UPDATE subcategory SET name = :name, category_id = :category_id WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":category_id", $data["category_id"], PDO::PARAM_STR);

        $stmt->execute();
    }
?>
