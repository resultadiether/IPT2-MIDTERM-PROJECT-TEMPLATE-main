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

    // Use the correct code to resolve the conflict
    $stmt = $conn->prepare("UPDATE pure_pour SET CUSTOMER_NAME = ?, DRINK_NAME = ?, CATEGORY = ?, PREFERENCE = ?, SIZE = ?, PRICE = ?, SERVICE_TYPE = ? WHERE CUSTOMER_ID = ?");
    if ($stmt === false) {
        $_SESSION['status'] = "Error preparing statement: " . $conn->error;
        header("Location: ../index.php");
        exit();
    }

    $stmt->bind_param("sssssdsi", $CUSTOMER_NAME, $DRINK_NAME, $CATEGORY, $PREFERENCE, $SIZE, $PRICE, $SERVICE_TYPE, $CUSTOMER_ID);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Order updated successfully";
    } else {
        $_SESSION['status'] = "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: ../index.php");
    exit();
}
?>