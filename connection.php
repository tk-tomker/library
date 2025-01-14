<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE DATABASE IF NOT EXISTS Library";
echo("connection");
?>