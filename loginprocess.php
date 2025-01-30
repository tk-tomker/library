
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
            // header('Location: mainpage.php');
            $role = $row["role"];
            echo($role);
            
        }
        else{

            echo("login failed");
            // header('Location: signin.php');
        }
    }
    $conn=null;
?>