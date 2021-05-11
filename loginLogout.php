<?php
    session_start();
    include 'library/config.php';
    include 'library/connect.php';
    if (isset($_REQUEST['idAccount'])) {
        $pwd = md5($_REQUEST['password']);
        $stmt = $conn->prepare("SELECT * FROM student WHERE id = :username AND password = :password");
        $stmt->bindParam(":username", $_REQUEST['idAccount'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $pwd, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            echo "None";
        } else {
            $_SESSION['idAccount'] = $_REQUEST['idAccount'];
        }
    }
    if(isset($_REQUEST["action"]))  
    {  
        unset($_SESSION["idAccount"]);  
    }  
    if (isset($_REQUEST["oPwd"]) && isset($_REQUEST["nPwd"]) && isset($_REQUEST["PwdC"])){
        $old = md5($_REQUEST['oPwd']);
        $stm = $conn->prepare("SELECT * FROM student WHERE id = :username AND password = :password");
        $stm->bindParam(":username", $_SESSION['idAccount'], PDO::PARAM_STR);
        $stm->bindParam(":password", $old, PDO::PARAM_STR);
        $stm->execute();
        if ($stm->rowCount() == 0) {
            echo "None";
        } else {
            if ($_REQUEST["nPwd"] != $_REQUEST["PwdC"]) {
                echo "Dont match";
            } else {
                $new = md5($_REQUEST['nPwd']);
                $st = $conn->prepare("UPDATE student SET password = :pwd WHERE id = :id");
                $st->bindParam(":id", $_SESSION['idAccount'], PDO::PARAM_STR);
                $st->bindParam(":pwd", $new, PDO::PARAM_STR);
                $st->execute();
            }
        }
    }
?>