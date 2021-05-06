<?php
    //Check student account exist
    function checkStudentExist($conn, $data){
        $stmt = $conn->prepare("SELECT * FROM student WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count != 0) {
            return true;
        }
        return false;
    }
    //Create new student account
    function createStudentAccount($conn, $data){
        $stmt = $conn->prepare("INSERT INTO student (id, fullname, password, email, phone, status, reg_date, updation_date) VALUES(:id, :fullname, :password, :email, :phone, :status, :reg_date, :updation_date)");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
        $stmt->bindParam(":password", md5($data["password"]), PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
        $stmt->bindParam(":reg_date", $data["reg_date"], PDO::PARAM_INT);
        $stmt->bindParam(":updation_date", $data["updation_date"], PDO::PARAM_INT);

        $stmt->execute();
    }
    //get account list
    function getDataStudentList($conn){
        $stmt = $conn->prepare("SELECT * FROM student");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //get issued book detail by id
    function getDataStudentById($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM student WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //Delete account student
    function deleteAccountStudent($conn, $id){
        $stmt = $conn->prepare("DELETE FROM student WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //update student
    function editStudentDetail($conn, $data){
        $stmt = $conn->prepare("UPDATE student SET fullname = :fullname, email = :email, phone = :phone, updation_date = :updation_date, status = :status WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
        $stmt->bindParam(":updation_date", $data["updation_date"], PDO::PARAM_INT);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);

        $stmt->execute();
    }
    //get issued book history
    function getHistoryIssuedBook($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM issuedbook_detail isd INNER JOIN issuedbook i ON isd.id_issued = i.id INNER JOIN student s ON i.student_id = s.id WHERE s.id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>
