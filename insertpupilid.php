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

    $user_id = $_SESSION['pupilid']; // Retrieve the session variable

    // Insert the session variable into the SQL table
    $sql = "INSERT INTO tblloans (pupilid) VALUES ('$user_id')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    echo "Book Loaned Successfuly ✅";
    header("Location: mainpage.php");
}
?>