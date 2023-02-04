
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>





</head>

<body>
   


<?php

$id = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sample";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, Firstname, Status from tbl_accounts WHERE ID = '$id' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
    

?>



<div class="row">
<div class="col-md-3">
    
</div>


<div class="col-md-6">
<center>
    <form action=""  method = "post">
  <label for="fname" >First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($row['Firstname']); ?>"><br>
  <label for="Status">Status:</label><br>
  <input type="text" id="Status" name="Status" value="<?php echo  htmlspecialchars($row['Status']); ?>">
<br><br>
  <button type="submit" name="submitB" id="submitB" class="btn btn-outline-secondary "><b>Edit</b>
</button>
</form>
  </center>
</div>
<div class="col-md-3">
    
</div>
</div>



<?php
}
} else {
  echo "0 results";
}
$conn->close();
?>

<?php




if(isset($_POST['submitB'])){

$firstname =  htmlspecialchars($_POST['fname']);
$stats = htmlspecialchars($_POST['Status']);
   


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE tbl_accounts SET Firstname = '$firstname', Status = '$stats' WHERE ID = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

  header("Refresh:0; url=index.php");


}

?>



</body>
</html>


