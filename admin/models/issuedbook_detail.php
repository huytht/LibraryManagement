<?php
    function createIssuedBookDetail($conn, $idIssued, $isbn){
        $stmt = $conn->prepare("INSERT INTO issuedbook_detail (id_issued, isbn) VALUES (:id_issued, :isbn)");
        $stmt->bindParam(":isbn", $isbn, PDO::PARAM_STR);
        $stmt->bindParam(":id_issued", $idIssued, PDO::PARAM_INT);

        $stmt->execute();
    }
    //get issued book detail list
    function getDataIssuedBookDetailList($conn){
        $stmt = $conn->prepare("SELECT * FROM issuedbook_detail");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //get issued book detail by id
    function getDataIssuedBookDetailByID($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM issuedbook_detail WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //update issued book detail
    function editIssuedBookDetail($conn, $data){
        $stmt = $conn->prepare("UPDATE issuedbook_detail SET id_issued = :id_issued, isbn = :isbn, return_status = :return_status WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindParam(":id_issued", $data["id_issued"], PDO::PARAM_INT);
        $stmt->bindParam(":isbn", $data["isbn"], PDO::PARAM_STR);
        $stmt->bindParam(":return_status", $data["return_status"], PDO::PARAM_INT);
        $stmt->execute();
        //update book
        $st = $conn->prepare("UPDATE book SET status = 0 WHERE isbn = :isbn");
        $st->bindParam(":isbn", $data["isbn"], PDO::PARAM_STR);
        $st->execute();
    }
    //Delete issued book detail
    function deleteIssuedBookDetail($conn, $id){
        $stmt = $conn->prepare("DELETE FROM issuedbook_detail WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    //Delete all issued book detail by id issued
    function deleteIssuedBookDetailByIdIssued($conn, $id){
        $stmt = $conn->prepare("DELETE FROM issuedbook_detail WHERE id_issued = :id_issued");
        $stmt->bindParam(":id_issued", $id, PDO::PARAM_INT);
        $stmt->execute();
        
    }
    //get issued book detail by id_issued
    function getDataIssuedBookDetailByIdIssued($conn, $id){
        $stmt = $conn->prepare("SELECT * FROM issuedbook_detail WHERE id_issued = :id_issued");
        $stmt->bindParam(":id_issued", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getListNotReturn($conn, $id_issued){
        $st = $conn->prepare("SELECT * FROM issuedbook_detail isd INNER JOIN issuedbook i ON isd.id_issued = i.id WHERE isd.return_status = 0 AND id_issued = :id_issued");
        $st->bindParam(":id_issued", $id_issued, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //check day and fine
    function getFineValue($conn, $id_issued){
        $now = time();
        $issued = getDataIssuedBookById($conn, $id_issued);
        $sum = 0;
        foreach(getListNotReturn($conn, $id_issued) as $data){
            $book = getBookByISBN($conn, $data["isbn"]);
            $sum += (10/100 * $book['price'] *  round((strtotime(date("m/d/Y")) - $issued["return_date"]) / (60 * 60 * 24)));
        }
        $stmt = $conn->prepare("UPDATE issuedbook SET fine = :fine  WHERE return_date < :now AND id = :id");
        $stmt->bindParam(":fine", $sum, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id_issued, PDO::PARAM_INT);
        $stmt->bindParam(":now", $now, PDO::PARAM_INT);
        $stmt->execute();
    }
?>

