<?php
include_once("connection.php")
echo("submitted")

<?php
echo $_POST["bookid"]."<br>";
echo $_POST["author"]."<br>";
echo $_POST["title"]."<br>";
echo $_POST["booklength"]."<br>";
echo $_POST["bookstatus"]."<br>";
echo $_POST["genre"]."<br>";
echo $_POST["dateadded"]."<br>";
?>

$stmt = $conn->prepare("INSERT INTO TblUser (bookid,author,title,booklength,bookstatus,genre,dateadded)VALUES (null,:bookid,:author,:booklength,:bookstatus,:genre,:dateadded");

$stmt->bindParam(':bookid', $_POST["bookid"]);
$stmt->bindParam(':author', $_POST["author"]);
$stmt->bindParam(':booklength', $_POST["booklenth"]);
$stmt->bindParam(':bookstatus', $_POST["bookstatus"]);
$stmt->bindParam(':genre', $_POST["genre"]);
$stmt->bindParam(':dateadded', $_POST["dateadded"]);
$stmt->bindParam(':role', $role);
$stmt->execute();
$conn=null;

?>