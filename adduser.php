<?php
include_once("connection.php");
header('Location:userandhouse.php');
array_map("htmlspecialchars", $_POST);

print_r($_POST);
echo($_POST["forename"]);
switch($_POST["role"]){
	case "Pupil":
		$role=0;
		break;
	case "Admin":
		$role=1;
		break;
}

$stmt = $conn->prepare("INSERT INTO tblpupils (pupilid,surname,forename,role,username,password,year,house)
VALUES (null,:surname,:forename,:role,:username,:password,:year,:house)");

$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':username', $_POST["username"]);
$stmt->bindParam(':password', $_POST["password"]);
$stmt->bindParam(':role', $role);
$stmt->bindParam(':year', $_POST["year"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->execute();

$conn->null;


$conn=null;

?>