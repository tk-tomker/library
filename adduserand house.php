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

$stmt = $conn->prepare("INSERT INTO tblhouse (house,email,teacher)VALUES (NULL,:subjectname,:teacher)");
$stmt->bindParam(':subjectname', $_POST["subjectname"]);
$stmt->bindParam(':teacher', $_POST["teacher"]);

$stmt->execute();

$conn=null;

?>