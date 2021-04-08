<?php
    //create new issued book detail
    function createIssuedBookDetail($conn, $data){
        $stmt = $conn->prepare("INSERT INTO issuedbook (isbn, student_id, issues_date, return_date) VALUES (:isbn, :student_id, :issues_date, :return_date)");
        $stmt->bindParam(":isbn", $data["isbn"], PDO::PARAM_INT);
        $stmt->bindParam(":student_id", $data["student_id"], PDO::PARAM_STR);
        $stmt->bindParam(":issues_date", $data["issues_date"], PDO::PARAM_INT);
        $stmt->bindParam(":return_date", $data["return_date"], PDO::PARAM_INT);

        $stmt->execute();
    }
    //get issued book detail list
    function getDataIssuedBookList($conn){
        $stmt = $conn->prepare("SELECT * FROM issuedbook");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //check book is issued
    function checkBookIssued($conn, $isbn){
        $stmt = $conn->prepare("SELECT * FROM book WHERE isbn = :isbn AND status = 0");
        $stmt->bindParam(":isbn", $isbn, PDO::PARAM_INT);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount == 0){
            return false;
        }
        return true;
    }
     //get issued book detail by id
    function getDataIssuedBookById($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM issuedbook WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //Delete issued book 
    function deleteIssuedBook($conn, $id){
        $stmt = $conn->prepare("DELETE FROM issuedbook WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    //update issued book detail
    function editIssuedBookDetail($conn, $data){
        $stmt = $conn->prepare("UPDATE issuedbook SET isbn = :isbn, student_id = :student_id, issues_date = :issues_date, return_date = :return_date, return_status = :return_status WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindParam(":isbn", $data["isbn"], PDO::PARAM_INT);
        $stmt->bindParam(":student_id", $data["student_id"], PDO::PARAM_STR);
        $stmt->bindParam(":issues_date", $data["issues_date"], PDO::PARAM_INT);
        $stmt->bindParam(":return_date", $data["return_date"], PDO::PARAM_INT);
        $stmt->bindParam(":return_status", $data["return_status"], PDO::PARAM_INT);

        $stmt->execute();
    }
    //check book is issued for edit
    function checkBookIssuedForEdit($conn, $isbn, $id){
        $stmt = $conn->prepare("SELECT * FROM book b JOIN issuedbook ib ON b.isbn = ib.isbn WHERE b.isbn = :isbn AND id != :id AND status = 0");
        $stmt->bindParam(":isbn", $isbn, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount == 0){
            return false;
        }
        return true;
    }
?>
