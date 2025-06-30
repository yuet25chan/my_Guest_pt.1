<?php

include'db_credentials.php';


$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}')";



if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header ("Location: index.php?message=guestadded");
?>



