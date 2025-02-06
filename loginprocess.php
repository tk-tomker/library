<?php
include_once ("connection.php");
session_start();
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblpupils WHERE Username =:username ;" );
$stmt->bindParam(':username', $_POST["Username"]);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    $_SESSION['login_error'] = "Username not found.";
    header('Location: mainpage.php');
    exit();
}

if($row['password']== $_POST['password']){
    session_set_cookie_params(0);
    $_SESSION["role"] = $row["role"];
    $_SESSION["pupilid"] = $row["pupilid"];
    $_SESSION["forename"] = $row["forename"];
    header('Location: mainpage.php'); 
    exit(); 
}

else{
    $_SESSION['login_error'] = "Invalid username or password.";
    header('Location: mainpage.php');
    exit();
}

$conn=null;
?>