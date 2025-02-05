<?php
    include_once ("connection.php");
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("SELECT * FROM tblpupils WHERE Username =:username ;" );
    $stmt->bindParam(':username', $_POST["Username"]);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if($row['password']== $_POST['password']){

            echo("login complete");
            session_start();
            session_set_cookie_params(0);
            $_SESSION["role"] = $row["role"];
            $_SESSION["pupilid"] = $row["pupilid"];
            $_SESSION["forename"] = $row["forename"];
            header('Location: mainpage.php');
            
        }
        else{
            session_start();
            $_SESSION['login_error'] = "Invalid username or password.";
            header('Location: mainpage.php');
        }
    }
    $conn=null;
?>