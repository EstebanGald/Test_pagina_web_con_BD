<?php
/*
$link = 'mysql:host=localhost;dbname=yaptube';
$usuario = 'root';
$password = 'root';
*/
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "yaptube";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//$conn->close();
/*
try {
  $pdo = new PDO($link,$usuario,$password);
  //echo 'Conectado';
} catch (PDOException $e) {
  print "¡Error!: " . $e->getMessage() . "<br/>";
  die();
}
*/
