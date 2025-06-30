<?php
include'db_credentials.php';


// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id='{$_POST['id']}'";




if ($conn->query($sql) === TRUE) {
  header ("Location: index.php?message=guestdeleted");
  exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


?>