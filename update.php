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

$id = $_GET["id"];

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    $fname = $row["firstname"];
    $lname = $row["lastname"];
    $email = $row["email"];
  }
}else{
  echo "Error ".$conn->error;
}

?>

<html>
<body>
  <form action="updateuser.php" method="post">
    First name: <input value="<?php echo $fname; ?>" type="text" name="fname" /><br>
    Last name: <input value="<?php echo $lname; ?>" type="text" name="lname" /><br>
    Email: <input value="<?php echo $email; ?>" type="text" name="email" /><br>
    <input type="submit" value="Update">
    <input type="hidden" name="id" value="<?php echo $id;?>" />
  </form>
</body>
</html>

<?php
$conn->close();
?>