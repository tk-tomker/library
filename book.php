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
<form action="addbook.php" method ="post" enctype="multipart/form-data">
  Title: <input type="text" name="title"><br>
  Author:<input type="text" name="author"><br>
  No. Of Pages:<input type="number" name="booklength"><br>
  Status:<select name="bookstatus">
        <option value="in">In Library</option>
        <option value="out">On Loan</option>
    </select>
  
  <br>
  Genre:<select name="genre">
        <option value="mystery">Mystery</option>
        <option value="action">Action</option>
        <option value="horror">Horror</option>
        <option value="history">History</option>
        <option value="romance">Romance</option>
        <option value="scifi">Sci-Fi</option>
        <option value="crimefiction">Crime Fiction</option>
        <option value="western">Western</option>
        <option value="cookbook">Cookbook</option>
    </select><br>
  Today's Date:<input type="date" name="dateadded"><br>
  Image: <input type="file" id="picture" name="picture" accept="image/*"><br>
  <br>

  <input type="submit" value="Add Book">
</form>
<div class="container-fluid" align="center">
  <?php
  include_once("connection.php"); // Your database connection file

  ?>
</div>
</body>