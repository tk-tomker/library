<?php
include_once ("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    //set bookid of book returned
    if (isset($_POST['booktoreturn']) && !empty($_POST['booktoreturn'])) {
        $bookid = $_POST['booktoreturn'];
    } else {
        $_SESSION['message'] = "Error: No book selected.";
        header("Location: mainpage.php");
        exit();
    }
    //change bookstatus to out
    if (isset($_SESSION['bookid'])) {
        if ($stmt->execute()){
            $update_sql = "UPDATE tblbooks SET bookstatus ='in' WHERE bookid = $bookid";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bindparam(":bid", $bookid);

        }}

    }
?>