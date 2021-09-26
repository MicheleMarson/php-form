<?php 

$servername = "localhost";
$username = "root"; // user must have rights to change data
$password = "admin"; 
$dbname = "mywebsite";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error){
  die("Connection failed".$conn->connect_error);
}

if(isset($_GET["message"])){ // if value is attached to message
  if(($_GET["message"]) == "delete"){
    echo "Record deleted";
  }else if(($_GET["message"]) == "delete"){
    echo "Record updated";
  }else{
    echo "Error updating/deleting";
  }
}

$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sql);

?>

<table width="300" border="1" cellspacing="1" cellpadding="4">
  <?php
  
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
  ?>
  <tbody>
    <tr>
      <td>ID</td>
      <td><?php echo $row["id"]; ?></td>
      <td><a href="deluser.php?id=<?php echo $row["id"];?>">Delete</a></td>
      <td><a href="update.php?id=<?php echo $row["id"];?>">Update</a></td>
    </tr>
    <tr>
      <td>First Name</td>
      <td><?php echo $row["firstname"]; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><?php echo $row["lastname"]; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $row["email"]; ?></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
  <?php
    }
    ?>
</table>
  <?php
  }else{
    echo "Fail";
  }
  ?>    