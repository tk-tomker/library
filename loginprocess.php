
<?php
    include_once ("connection.php");
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("SELECT * FROM tblpupils WHERE Username =:username ;" );
    $stmt->bindParam(':username', $_POST['Username']);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    { 
        if($row['password']== $_POST['password']){
            header('Location: mainpage.php');
        }else{
    
            header('Location: signin.php');
        }
    }
    $conn=null;
?>