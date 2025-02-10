<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php include 'navbar.php';?>
<form action="addbook.php" method ="post" >
  Author:<input type="text" name="author"><br>
  Title: <input type="text" name="title"><br>
  No. Of Pages:<input type="number" name="booklength"><br>
  Status:<select name="bookstatus">
        <option value="in">In Library</option>
        <option value="out">On Loan</option>
    </select>
  
  <br>
  Genre:<select name="genre">
        <option value="mystery">Mystery</option>
        <option value="action">Action</option>
    </select><br>
  <!-- Add genres table to pick from -->
  Today's Date:<input type="date" name="dateadded"><br>
  <!--Creates a drop down list-->
  <br>

  <input type="submit" value="Add Book">
</form>
<div class="container-fluid" align="center">
  <?php
  include_once("connection.php"); // Your database connection file

  ?>
</div>
</body>