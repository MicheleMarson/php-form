<?php

$servername = "localhost";
$username = "root";
$password = "admin"; 
$dbname = "mywebsite";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error){
  die("Connection failed".$conn->connect_error);
}

$id = $_GET["id"]; // this is from url in delete.php 

// sql to delete a record
$sql = "DELETE FROM users WHERE id = $id";

if($conn->query($sql) === TRUE){
  header("location:delete.php?message=delete"); // redirect back after deleting and sent variable
}else{
  echo "Error deleting record ".$conn->error;
}

$conn->close();

?>