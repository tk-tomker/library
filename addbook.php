<?php
include_once("connection.php");
echo("submitted");



echo $_POST["author"]."<br>";
echo $_POST["title"]."<br>";
echo $_POST["booklength"]."<br>";
echo $_POST["bookstatus"]."<br>";
echo $_POST["genre"]."<br>";
echo $_POST["dateadded"]."<br>";

 
$stmt = $conn->prepare("INSERT INTO tblbooks (author,title,booklength,bookstatus,genre,dateadded,image)VALUES (:author, :title, :booklength,:bookstatus,:genre,:dateadded, :pic)");

$stmt->bindParam(':author', $_POST["author"]);
$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':booklength', $_POST["booklength"]);
$stmt->bindParam(':bookstatus', $_POST["bookstatus"]);
$stmt->bindParam(':genre', $_POST["genre"]);
$stmt->bindParam(':dateadded', $_POST["dateadded"]);
$stmt -> bindParam(':pic', $_FILES["picture"]["name"]);

$stmt->execute();
$target_dir = "images/";
print_r($_FILES);
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)){
    echo "The file" . htmlspecialchars( basename( $_FILES["picture"]["name"])). "has been uploaded";
} else{
    echo "Sorry, there was an error uploading your file.";
}


$conn=null;
header("Location:book.php")

?>
