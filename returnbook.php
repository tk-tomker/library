<?php
include_once ("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //set bookid of book returned
    if (isset($_POST['booktoreturn']) && !empty($_POST['booktoreturn'])) {
        $bid = $_POST['booktoreturn'];
    } else {
        $_SESSION['message'] = "Error: No book selected.";
        header("Location: mainpage.php");
        exit();
    }

try {

    $conn -> beginTransaction();

    $stmt1 = $conn->prepare("DELETE FROM tblloans WHERE bookid = :bookid");
    $stmt1->bindParam(":bookid", $bid);
    $stmt1->execute();

    $stmt2 = $conn->prepare("UPDATE tblbooks SET bookstatus = 'in' WHERE bookid = :bookid");
    $stmt2->bindParam(":bookid", $bid);
    $stmt2->execute();
    

    $conn->commit();
    $_SESSION['message'] = "Book Returned successfully";
} catch (PDOException $e) {
    $conn->rollBack();
    $_SESSION['message'] = "Error: " . $e->getMessage();
}

header("Location: mainpage.php");
exit();
}

?>