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

<div class="books" href="#books">
    <form action="????Possibly books?????.php">
        Choose Book to Loan:<select name="booktoloan">
        <?php

            include_once("connection.php"); // Your database connection file

            try {
                // Query to fetch options from the database
                $stmt = $conn->prepare("SELECT title FROM tblbooks WHERE bookstatus ='in'");
                $stmt->execute();

                // Loop through the results and generate <option> elements
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . htmlspecialchars($row['title']) . "'>" . htmlspecialchars($row['title']) . "</option>";
                }
            } catch (PDOException $e) {
                echo "Error fetching options: " . $e->getMessage();
            }
        ?>
        <br>
        <input type="submit" value="Loan Book">

    </form>
</div>
</body>

