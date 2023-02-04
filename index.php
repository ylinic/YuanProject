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
    <center>
        <br><br>








        <div class="row">
            <div class="col-md-3">
     
            </div>
            <div class="col-md-6">
           
  
  

            <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     
             



            <?php
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

$sql = "SELECT ID, Firstname, Status from tbl_accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
    
 

    echo '<tr>
    <td scope="row">'.$row["ID"].'</td>';
    echo '
    <th scope="row">'.htmlspecialchars($row["Firstname"]).'</td>';
    echo '<td scope="row">'.$row["Status"].'</td>';
    echo '<td scope="row"> <a href="edit.php?id='.$row["ID"].'"><button type="button" class="btn btn-outline-secondary "><b>Edit</b>
</button></a></td>';

    echo '</tr>';
    

  }
} else {
  echo "0 results";
}
$conn->close();
?>



        
</tbody>
                </table>

 


            <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal"
                data-target="#exampleModal"><b>ADD</b>
            </button>

            <div class="col-md-3">

            </div>
        </div>




     

</div>
<!-- 

<div class="row">
    <div class="col-md-3"></div>


<div class="col-md-6">

<br><br><br>
<form action="index.php"  method = "post">


  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="Status">Status:</label><br>
  <input type="text" id="Status" name="Status">
<br><br>
  <button type="submit" name="submitB" id="submitB" class="btn btn-outline-secondary "><b>Add</b>
</button>
</form>


</div>

<div class="col-md-3"></div>
</div> -->


<?php

if(isset($_POST['submitB'])){


    $firstname = $_POST['fname'];
    $stats = $_POST['Status'];
    


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tbl_accounts (Firstname, Status)
VALUES ('$firstname', '$stats')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Refresh:0; url=index.php");


}

?>










        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <div class="row">
    <div class="col-md-3"></div>
<div class="col-md-6">

<br><br><br>
<form action="index.php"  method = "post">


  <label for="fname"><b>First name:</b></label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="Status"><b>Status:</b></label><br>
  <input type="text" id="Status" name="Status">



<br><br>
  <button type="submit" name="submitB" id="submitB" class="btn btn-outline-secondary "><b>Add</b>
</button>
</form>
<br>
<br>

</div>

<div class="col-md-3"></div>
</div>
                    </div>
                    <div class="modal-footer">
                       
                    </div>
                </div>
            </div>
        </div>




    </center>






</body>

</html>