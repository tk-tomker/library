<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<style>
</style>
<body>
<?php include 'navbar.php';?>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 bg" align="center">
            <form action="adduser.php" method="POST" align="center">
                <h2>Add User</h2>
                First name:<input type="text" name="forename"><br>
                Last name:<input type="text" name="surname"><br>
                <input type="radio" name="role" value="Pupil" checked> User<br>
                <input type="radio" name="role" value="Admin"> Admin<br>
                Username:<input type="text" name="username"><br>
                Password:<input type="text" name="password"><br>
                House:<select name="house">
                    <?php
                    include_once("connection.php"); // Your database connection file
                    try {
                        // Query to fetch options from the database
                        $stmt = $conn->prepare("SELECT house FROM tblhouse");
                        $stmt->execute();
                        // Loop through the results and generate <option> elements
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . htmlspecialchars($row['house']) . "'>" . htmlspecialchars($row['house']) . "</option>";
                        }
                    } 
                    catch (PDOException $e) {
                        echo "Error fetching options: " . $e->getMessage();
                    }
                    ?>
                </select>
                Year:<select name="year">
                    <option value=9>3rd Form</option>
                    <option value=10>4th Form</option>
                    <option value=11>5th Form</option>
                    <option value=12>L6th Form</option>
                    <option value=13>U6th Form</option>
                </select>
                <br>
                <input type="submit" name="action" value="Add User">

            </form>
        </div>
        <div class="col-sm-4" align="center">
            <form action="addhouse.php" method="POST" align="center">
                <h2>Add House</h2>
                House:<input type="text" name="house"><br>
                Hsm:<input type="text" name="hsm"><br>
                Email:<input type="email" name="email"><br>
            <input type="submit" value="Add House">
            </form>
        </div>
    </div> 
</div>
    
<form action="addhouse.php" method="POST" align="center">
    <h2>Add House</h2>
    House:<input type="text" name="house"><br>
    Hsm:<input type="text" name="hsm"><br>
    Email:<input type="email" name="email"><br>
    <input type="submit" value="Add House">
</form>

<h2 align="center">Current users</h2>
<p align="center">
    <?php
    include_once("connection.php");
    try {
        $stmt = $conn->prepare("SELECT forename, surname FROM tblpupils");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo htmlspecialchars($row["forename"]) . " " . htmlspecialchars($row["surname"]) . "<br>";
        }
    } 
    catch (PDOException $e) {
        echo "Error retrieving users: " . $e->getMessage();
    }
    ?>
</p>

<h2 align="center">Current Houses</h2>
<p align="center">
    <?php
    try {
        $stmt = $conn->prepare("SELECT house, hsm, email FROM tblhouse");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "House: " . htmlspecialchars($row["house"]) . "<br>";
            echo "HSM: " . htmlspecialchars($row["hsm"]) . "<br>";
            echo "Email: " . htmlspecialchars($row["email"]) . "<br><br>";
        }
    } 
    catch (PDOException $e) {
        echo "Error retrieving houses: " . $e->getMessage();
    }
    ?>
</p>
</body>
</html>