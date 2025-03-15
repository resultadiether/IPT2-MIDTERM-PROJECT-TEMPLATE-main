<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CUSTOMER_ID = $_POST['CUSTOMER_ID'];
    $CUSTOMER_NAME = $_POST['CUSTOMER_NAME'];
    $DRINK_NAME = $_POST['DRINK_NAME'];
    $CATEGORY = $_POST['CATEGORY'];
    $PREFERENCE = $_POST['PREFERENCE'];
    $SIZE = $_POST['SIZE'];
    $PRICE = $_POST['PRICE'];
    $SERVICE_TYPE = $_POST['SERVICE_TYPE'];

  $sql = "UPDATE pure_pour SET CUSTOMER_NAME = '$CUSTOMER_NAME', DRINK_NAME = '$DRINK_NAME', CATEGORY = '$CATEGORY', PREFERENCE = '$PREFERENCE', SIZE = '$SIZE', PRICE = '$PRICE', SERVICE_TYPE = '$SERVICE_TYPE'  WHERE CUSTOMER_ID = '$CUSTOMER_ID'";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Order updated successfully";
  } else {
    $SESSION['status'] = "Error";
  }

  mysqli_close($conn);
  header("Location: ../index.php");
  exit();
}
?>