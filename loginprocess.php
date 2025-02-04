
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
            $role = $row["role"];
            $pupilid = $row["pupilid"];
            $forename = $row["forename"];
            $_SESSION["role"] = $role;
            $_SESSION["pupilid"] = $pupilid;
            $_SESSION["forename"] = $forename;
            header('Location: mainpage.php');
            
        }
        else{

            echo("login failed");
            // header('Location: signin.php');
        }
    }
    $conn=null;
?>