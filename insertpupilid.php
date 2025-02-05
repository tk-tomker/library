<?php
if ($_SERVER["REQUEST_METHOD"] =="POST"){

    session_start();

    // Assume you have already created a connection to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $pupil = $_SESSION['pupilid']; // Retrieve the session variable
    $book_id = $_SESSION['bookid'];

    // Insert the session variable into the SQL table
    $sql = "INSERT INTO tblloans (pupilid, bookid) VALUES ('$pupil', '$book_id')";
    

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Book Loan Successfully ✅";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: mainpage.php");
    exit();

}
?>