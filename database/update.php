<?php
include('../database/database.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch the current details of the music entry
  $sql = "SELECT * FROM pure_pour WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    die("Record not found");
  }
} else {
  die("No ID provided");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CUSTOMER_NAME = $_POST['Customer'];
    $DRINK_NAME = $_POST['Drinks'];
    $CATEGORY = $_POST['Category'];
    $PREFERENCE = $_POST['Preference'];
    $SIZE = $_POST['Sizes'];
    $PRICE = $_POST['Price'];
    $SERVICE_TYPE = $_POST['Services'];

  $sql = "UPDATE music SET Customer = '$CUSTOMER_NAME', Drinks = '$DRINK_NAME', Category = '$CATEGORY', Preference = '$PREFERENCE', Sizes = '$SIZE', Price = '$PRICE', Services = '$SERVICE_TYPE'  WHERE id = $id";

  if ($conn->query($sql)) {
    $status = "Record updated successfully";
  } else {
    $status = "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
  header("Location: ../index.php?status=$status");
  exit();
}
?>