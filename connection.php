<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully <br>"; //commented to remove annoying message no longer needed!
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage()."<br>";
    }
?>