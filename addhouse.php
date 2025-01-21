<?php
include_once("connection.php");
header('Location:userandhouse.php');
array_map("htmlspecialchars", $_POST);

print_r($_POST);

$stmt = $conn->prepare("INSERT INTO tblhouse (house,hsm,email)VALUES (:house, :hsm, :email)");
$stmt->bindParam(':house', $_POST["house"]);       
$stmt->bindParam(':hsm', $_POST["hsm"]);
$stmt->bindParam(':email',$_POST["email"]);
$stmt->execute();

$conn=null;
?>