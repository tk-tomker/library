<?php
include_once("connection.php");
echo("submitted");



echo $_POST["author"]."<br>";
echo $_POST["title"]."<br>";
echo $_POST["booklength"]."<br>";
echo $_POST["bookstatus"]."<br>";
echo $_POST["genre"]."<br>";
echo $_POST["dateadded"]."<br>";

 
$stmt = $conn->prepare("INSERT INTO tblbooks (author,title,booklength,bookstatus,genre,dateadded)VALUES (:author, :title, :booklength,:bookstatus,:genre,:dateadded)");

$stmt->bindParam(':author', $_POST["author"]);
$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':booklength', $_POST["booklength"]);
$stmt->bindParam(':bookstatus', $_POST["bookstatus"]);
$stmt->bindParam(':genre', $_POST["genre"]);
$stmt->bindParam(':dateadded', $_POST["dateadded"]);

$stmt->execute();

$conn=null;
header("Location:book.php")

?>
