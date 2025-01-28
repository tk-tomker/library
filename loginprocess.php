
<?php
    include_once ("connection.php");
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("SELECT * FROM tblpupils WHERE Username =:username ;" );
    $stmt->bindParam(':username', $_POST['Username']);
    $stmt->execute();
    $conn=null;
?>