<?php
include_once ("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

   

    if (isset($_POST['booktoloan']) && !empty($_POST['booktoloan'])) {
        $bookid = $_POST['booktoloan'];
    }
    else {
        $_SESSION['message'] = "Error: No book selected.";
        header("Location: mainpage.php");
        exit();
    }

    if (isset($_SESSION['pupilid'])) {
        $pupil = $_SESSION['pupilid'];
        echo "DEBUG: Pupil ID = " . $pupil . "<br>"; // Debugging Line

        $sql = "INSERT INTO tblloans (pupilid, bookid) VALUES (:pup, :book)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':pup', $pupil);
        $stmt->bindParam(':book', $bookid);
        $stmt->execute();
    

        
        if ($stmt->execute()){
            $update_sql = "UPDATE tblbooks SET bookstatus ='out' WHERE bookid = :bid";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bindparam(":bid", $bookid);
        }

       

        if ($update_stmt->execute()) {
            $_SESSION['message'] = "Book Loan Successful ✅";
        } else {
            $_SESSION['message'] = "Error inserting loan: " . $stmt->error;
        }

       # $stmt->close();
    } 
    
    else {
        $_SESSION['message1'] = "You must be logged in to loan a book.";
    }
}
    header("Location: mainpage.php");
    exit();

?>
