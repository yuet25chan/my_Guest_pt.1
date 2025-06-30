<?php
include'db_credentials.php';

$sql = "UPDATE MyGuests SET firstname='{$_POST['firstname']}', lastname='{$_POST['lastname']}',
email='{$_POST['email']}', where id='$_POST['id']}';
if (mysqli_query($conn, $sql)) {
header ("Location: index.php?message=guestupdated"); exit;
  exit;
 else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
