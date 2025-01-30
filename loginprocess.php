
<?php
    include_once ("connection.php");
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("SELECT * FROM tblpupils WHERE Username =:username ;" );
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    { 
        if($row['password']== $_POST['password']){

            echo("login complete");
            // header('Location: mainpage.php');
            $role = $conn->prepare("SELECT role FROM tblpupils WHERE Username")
        }
        else{

            echo("login failed");
            // header('Location: signin.php');
        }
    }
    $conn=null;
?>