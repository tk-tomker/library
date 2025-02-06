<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['booktoloan']) && !empty($_POST['booktoloan'])) {
        $bookid = $_POST['booktoloan'];
    } else {
        $_SESSION['message'] = "Error: No book selected.";
        header("Location: mainpage.php");
        exit();
    }

    echo "DEBUG: Received Book ID = " . $bookid . "<br>"; // Debugging Line

    if (isset($_SESSION['pupilid'])) {
        $pupil = $_SESSION['pupilid'];
        echo "DEBUG: Pupil ID = " . $pupil . "<br>"; // Debugging Line

        $sql = "INSERT INTO tblloans (pupilid, bookid) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $pupil, $bookid);  // Ensure bookid & pupilid are integers

        if ($stmt->execute()){
            $update_sql = "UPDATE tblbook SET bookstatus ='out' WHERE bookid = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind-param("i", $bookid);

        }

        if ($update_stmt->execute()) {
            $_SESSION['message'] = "Book Loan Successful ✅";
        } else {
            $_SESSION['message'] = "Error inserting loan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "You must be logged in to loan a book.";
    }

    header("Location: mainpage.php");
    exit();
}
?>
