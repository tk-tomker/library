<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oundle School Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<style>

</style>



<body>
<?php include 'navbar.php';?>
    <div class="jumbotron" align="center">
        <h1>Library</h1>
        <p>Books available here</p>
    </div>
    <div class="container">
        <img src="">
    </div>

    <div class="loanbooks" align="center">
    <h2>Loan a Book</h2>
    <form action="insertpupilid.php" method="POST" class="form">
        <label for="booktitle">Choose Book to Loan:</label>
        <select name="booktoloan">
        <?php

            include_once("connection.php"); // Your database connection file

            try {
                // Query to fetch options from the database
                $stmt = $conn->prepare("SELECT bookid, title FROM tblbooks WHERE bookstatus ='in' order by title asc");
                $stmt->execute();

                // Loop through the results and generate <option> elements
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['bookid'] . "'>" . htmlspecialchars($row['title']) . "</option>";
                }
            } catch (PDOException $e) {
                echo "Error fetching options: " . $e->getMessage();
            }
        ?>
        </select>
        <br>
        <br>
        
        <input type="submit" name="submit" value="Loan Book" class="btn">
    <!-- Display the message if it's set -->
    <?php if (isset($_SESSION['message'])): ?>
    <div id="success-message" class="alert alert-success" role="alert">
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']); // Remove message after displaying
        ?>
    </div>

    <!-- JavaScript to hide the message after 3 seconds -->
    <script>
        setTimeout(function() {
            var message = document.getElementById("success-message");
            if (message) {
                message.style.transition = "opacity 0.5s ease";
                message.style.opacity = "0";
                setTimeout(() => message.remove(), 500); // Fully remove element after fade-out
            }
        }, 3000); // 3000ms = 3 seconds
    </script>
<?php endif; ?>
    </div>

<div class="viewloans" align="center">
        <h2>Current Loans</h2>
        <?php
        echo "need to select the loan id of all records in tblloans where pupilid = the session variable pupilid. Then display titles which correpsond with the bookid in tblbooks";
        ?>
        <br>
        <br>
        <form method="POST" class="form">
        <label for="booktitle">Choose Book to Return:</label>
        
        <select name="booktoloan">
        <?php

            include_once("connection.php"); // Your database connection file
            session_start();
            $pupil = $_SESSION['pupilid'];
            try {
                // Query to fetch options from the database
                $stmt = $conn->prepare("SELECT tblbooks.title as bktitle,  tblpupils.forename as fn FROM tblloans 
        INNER JOIN tblbooks ON tblbooks.bookid = tblloans.bookid 
        INNER JOIN tblpupils ON tblpupils.pupilid = tblloans.pupilid 
        WHERE  tblpupils.pupilid=$pupil;");

                // Loop through the results and generate <option> elements
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['bookid'] . "'>" . htmlspecialchars($row['title']) . "</option>";
                }
            } catch (PDOException $e) {
                echo "Error fetching options: " . $e->getMessage();
            }
        ?>
        </select>
        <br>
        <br>
        
        <input type="submit" name="submit" value="Loan Book" class="btn">

</div>
    
    </form>
</div>
</body>

