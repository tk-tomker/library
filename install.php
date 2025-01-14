<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE DATABASE IF NOT EXISTS Library";
$conn->exec($sql);

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblpupils;
CREATE TABLE tblpupils
(pupilid INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
surname VARCHAR(20) NOT NULL,
forename VARCHAR(20) NOT NULL,
year INT(2) NOT NULL,
house VARCHAR(20) NOT NULL)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblpupils created");

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblhouse;
CREATE TABLE tblhouse
(house VARCHAR(20)  PRIMARY KEY,
email VARCHAR(50) NOT NULL,
hsm VARCHAR(20) NOT NULL)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblhouse created");

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;
CREATE TABLE tblbooks
(bookid INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
author VARCHAR(50) NOT NULL,
title VARCHAR(50) NOT NULL, 
length INT(4) NOT NULL,
status  VARCHAR(10) NOT NULL,
genre VARCHAR(20) NOT NULL,
dateadded VARCHAR(20) NOT NULL
)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblbooks created");

?>