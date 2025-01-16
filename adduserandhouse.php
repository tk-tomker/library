<?php
include_once("connection.php");
header('Location:userandhouse.php');
array_map("htmlspecialchars", $_POST);

print_r($_POST);
echo($_POST["forename"]);

$stmt = $conn->prepare("INSERT INTO tblpupils (pupilid,surname,forename,year,house)
VALUES (null,:surname,:forename,:year,:house)");

$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':year', $_POST["year"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO tblhouse (house,hsm,email)
VALUES (:house, :hsm, :email)"):
$stmt->bindParam(':house', $_POST["house"]);       
$stmt->bindParam(':hsm', $_POST["hsm"]);
$stmt->bindParam(':email',$_POST["email"]);
$stmt->execute();

$conn=null;

?>