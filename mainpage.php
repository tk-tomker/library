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
    <link rel="stylesheet" href="styles.css">
</head>

<style>
table {
    width: 70%;
    margin-bottom: 50px;
}

td, th {
    margin: 5px;
    border: 1px solid black;
    text-align: center;
}
thead{
    text-align: center;
}
th {
        background-color:rgba(0, 255, 242, 0.64);
    }
    tr:nth-child(even) {
        background-color:rgba(0, 81, 255, 0.5);
    }
    tr:hover {
        background-color: rgba(0, 255, 242, 0.28);
    }
    
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
    <form action="loanbook.php" method="POST" class="form">
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
        </form>
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
        <br>
        <br>
        <form action="returnbook.php" method="POST" class="form">
        <label for="booktitle">Choose Book to Return:</label>
        
        <select name="booktoreturn">
        <?php

            include_once("connection.php"); // Your database connection file
            session_start(); // Ensure session is started

            if (!isset($_SESSION['pupilid'])) {
                die("Error: Pupil ID is not set in the session.");
            }

            $pupil = $_SESSION['pupilid'];

            
            try {
                // Query to fetch options from the database
                $stmt = $conn->prepare("SELECT DISTINCT tblbooks.title as bktitle,  tblpupils.forename as fn, tblbooks.bookid as bookid FROM tblloans 
        INNER JOIN tblbooks ON tblbooks.bookid = tblloans.bookid 
        INNER JOIN tblpupils ON tblpupils.pupilid = tblloans.pupilid 
        WHERE  tblpupils.pupilid=$pupil AND tblbooks.bookstatus = 'out';");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($rows)){
                echo "<p>No Book(s) on Loan.</p>";
            } else {
                foreach ($rows as $row){
                    echo "<option value='" . $row['bookid'] . "'>" . htmlspecialchars($row['bktitle']) . "</option>";
                }
            }

            } catch (PDOException $e) {
                echo "Error fetching options: " . $e->getMessage();
            }
        ?>
        </select>
        
        <br>
        <br>
        
        <input type="submit" name="submit" value="Return Book" class="btn">
        </form>
</div>
    
<div class="catalog" align="center">
    <h2>Our Catalog</h2>
    <br>
    <br>
    
    <table>
        <thead>
            <tr>
            
                <th>Author</th>
                <th>Title</th>
                <th>Book Length (pages)</th>
                <th>Book Status</th>
                <th>Genre</th>
                <th>Date Added</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("connection.php");

            $stmt = $conn->prepare("SELECT bookid, author, title, booklength, bookstatus, genre, dateadded FROM tblbooks");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo '<tr>';
                echo '<td>' . $row['author'] . '</td>';
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $row['booklength'] . '</td>';
                echo '<td>' . $row['bookstatus'] . '</td>';
                echo '<td>' . $row['genre'] . '</td>';
                echo '<td>' . $row['dateadded'] . '</td>';
                
                echo "</tr>"; 
                echo '</tr>';
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


</div>

</div>
</body>

