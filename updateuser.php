<?php
$servername = "localhost";
$username = "root"; 
$password = "admin"; 
$dbname = "mywebsite";

// form variables
$fname = val($_POST["fname"]);
$lname = val($_POST["lname"]);
$email = val($_POST["email"]);
$id = val($_POST["id"]);

// validation
function val($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed".$conn->connect_error);
}

// update users table
$sql = "UPDATE users SET firstname='$fname', lastname='$lname', email='$email' WHERE id=$id";

if($conn->query($sql) === TRUE){
  header("location:delete.php?message=success&id=".$id);
}else{
  echo "Error updating record".$conn->error;
}

$conn->close();
?>