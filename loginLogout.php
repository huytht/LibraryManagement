<?php
    session_start();
    include 'library/config.php';
    include 'library/connect.php';
    if (isset($_REQUEST['idAccount'])) {
        $stmt = $conn->prepare("SELECT * FROM student WHERE id = :username AND password = :password");
        $stmt->bindParam(":username", $_REQUEST['idAccount'], PDO::PARAM_STR);
        $stmt->bindParam(":password", md5($_REQUEST['password']), PDO::PARAM_STR);
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
?>