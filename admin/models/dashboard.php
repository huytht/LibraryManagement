<?php
    //get all table
    function getTableList($conn){
        $stmt = $conn->prepare("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'librarymanagement'");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>