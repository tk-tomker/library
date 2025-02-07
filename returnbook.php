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
        $sql = "UPDATE tblloans SET returned = 'Yes' WHERE bookid = $bookid; 
        UPDATE tblbooks SET bookstatus = 'in' WHERE bookid = $bookid;"

        $sql = "DELETE FROM tblloans WHERE bookstatus = 'in'";

        }}

    
?>