<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Guest App</title>
  <!-- Optional: Add Bootstrap CSS if you're using Bootstrap classes -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container"><div class="row"><div class="col-md-12">
<h1>My Guest App</h1>

<?php


if (isset($_GET['message'])) {
  if ($_GET['message']=='guestadded') {echo '<div class="alert alert-success">
  <strong>Success!</strong> Guest Added';}

if ($_GET['message']=='guestdeleted') {echo '<div class="alert alert-danger">
  <strong>Success!</strong> Guest Deleted.
</div>';}

}//first if
?>

<!--Form -->
<?php

    if (isset($_POST['editguest'])) {echo '<h3>Update Guest</h3><form class="form-horizontal" action="addguest.php" method="post">';} else { echo '<h3>Add a Guest</h3>';}
    ?>



</div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="firstname">First Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$_POST['firstname']?>" placeholder="Enter your first name">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Last Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?=$_POST['lastname']?>" id="lastname" name="lastname" placeholder="Enter your last name">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" value="<?=$_POST['email']?>"name="email" placeholder="Enter email">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">

    <?php

    if (isset($_POST['editguest'])){echo '<input type="hidden" name="id" value="' . $_POST['id'] . '">';
    echo '<button type="submit" class="btn btn-info" name="updateguest">Update Guest</button>';
} else {
    echo '<button type="submit" class="btn btn-success" name="addguest">Add Guest</button>';
}
    ?>
    
    </div>
  </div>
</form>

<table class="table table-striped table-hover table-bordered" style="margin-top:100px;">

<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>reg_date</th>
<th colspan="2"></th>
</tr>
<?php


// Create connection to MySQL database using the values above and stores the connection in the variable $conn
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
//if (!$conn) {
  //die("Connection failed: " . mysqli_connect_error());} redundant
include'db_credentials.php';

$sql = "SELECT* FROM MyGuests";
$result = mysqli_query($conn, $sql); //This creates a SQL query that selects all rows from the MyGuests table and sends sends the SQL query to the database and stores the result in $result.  

if (mysqli_num_rows($result) > 0) {
  // This checks if the query returned any rows. If it did, we go into a loop to display them.
  while($row = mysqli_fetch_assoc($result)) {
    ?> 
    <tr>
    <td><?=$row['id']?></td>
    <td><?=$row['firstname']?></td>
    <td><?=$row['lastname']?></td>
    <td><?=$row['email']?></td>
    <td><?=$row['reg_date']?></td>
    <td><form action="deleteguest.php" method="post">
      <input type="hidden" name="id" value="<?=$row['id']?>">
      <button type="submit" class="btn btn-danger" name="deleteguest">X</button>
  </form>
    </td>
<td>
  <form action="index.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <input type="hidden" name="firstname" value="<?=$row['firstname']?>">
    <input type="hidden" name="lastname" value="<?=$row['lastname']?>">
    <input type="hidden" name="email" value="<?=$row['email']?>">
    <input type="hidden" name="reg_date" value="<?=$row['reg_date']?>">
    <button type="submit" class="btn btn-info" name="editguest">edit</button>
  </form>
</td>

  </tr>
    <?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</table> <!--table should close right after the loop ends. -->


</div></div></div>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>
