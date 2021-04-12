<?php
    //Check admin account exist
    function checkAdminExist($conn, $data){
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count != 0) {
            return true;
        }
        return false;
    }
    //Create new admin account
    function createAdminAccount($conn, $data){
        $stmt = $conn->prepare("INSERT INTO admin (fullname, password, email, username, status) VALUES(:fullname, :password, :email, :username, :status)");
        $stmt->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
        $stmt->bindParam(":password", md5($data["password"]), PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);

        $stmt->execute();
    }
    //get account list
    function getDataAdminList($conn){
        $stmt = $conn->prepare("SELECT * FROM admin");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //get issued book detail by id
    function getDataAdminById($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM admin WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //Delete account admin
    function deleteAccountAdmin($conn, $id){
        $stmt = $conn->prepare("DELETE FROM admin WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //update admin
    function editAdminDetail($conn, $data){
        $stmt = $conn->prepare("UPDATE admin SET fullname = :fullname, email = :email, status = :status WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);

        $stmt->execute();
    }
    //Login
    function loginAdmin($conn, $username, $pwd){
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $pwd, PDO::PARAM_STR);

        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        }
        return false;
    }
    
?>
