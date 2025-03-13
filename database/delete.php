<?php
include('../database/database.php');

if (isset($_GET['CUSTOMER_ID'])) {
  $id = $_GET['CUSTOMER_ID'];

  $sql = "DELETE FROM pure_pour WHERE CUSTOMER_ID = $id";

  if ($conn->query($sql)) {
    $status = "Record deleted successfully";
  } else {
    $status = "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
  header("Location: ../index.php?status=$status");
  exit();
} else {
  header("Location: ../index.php?status=No ID provided");
  exit();
}
?>