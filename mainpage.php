<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oundle School Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>

</style>



<body>
<?php include 'navbar.php'; ?>
    <div class="jumbotron" align="center">
    <h1>Library</h1>
    <p>A place where you can get books</p>
    </div>
    <div class="container">
        <img src="">
    </div>

<div class="books" >
    <form action="insertpupilid.php" method="post">
        Choose Book to Loan:
        <select name="booktoloan">
        <?php

            include_once("connection.php"); // Your database connection file

            try {
                // Query to fetch options from the database
                $stmt = $conn->prepare("SELECT title FROM tblbooks WHERE bookstatus ='in' order by title asc");
                $stmt->execute();

                // Loop through the results and generate <option> elements
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . htmlspecialchars($row['title']) . "'>" . htmlspecialchars($row['title']) . "</option>";
                }
            } catch (PDOException $e) {
                echo "Error fetching options: " . $e->getMessage();
            }
        ?>
        </select>
        <br>
        <input type="submit" name="submit" value="Loan Book">
    <!-- Display the message if it's set -->
        <?php
        if (isset($_SESSION['message'])) {
         // Display the message in an alert box
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
            // Clear the message after displaying it
            unset($_SESSION['message']);
        }
?>
    
    </form>
</div>
</body>

