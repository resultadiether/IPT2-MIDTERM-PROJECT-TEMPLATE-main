<?php
include '../database/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $CUSTOMER_NAME = $_POST['CUSTOMER_NAME'];
    $DRINK_NAME = $_POST['DRINK_NAME'];
    $CATEGORY = $_POST['CATEGORY'];
    $PREFERENCE = $_POST['PREFERENCE'];
    $SIZE = $_POST['SIZE'];
    $PRICE = $_POST['PRICE'];
    $SERVICE_TYPE = $_POST['SERVICE_TYPE'];

    $sql = "INSERT INTO pure_pour (CUSTOMER_NAME, DRINK_NAME, CATEGORY, PREFERENCE, SIZE, PRICE, SERVICE_TYPE) 
            VALUES ('$CUSTOMER_NAME', '$DRINK_NAME', '$CATEGORY', '$PREFERENCE', '$SIZE', '$PRICE', '$SERVICE_TYPE')";

    $status = $conn->query($sql) === TRUE ? "New record created successfully" : "Error: {$sql}<br>{$conn->error}";

    mysqli_close($conn);
    header("Location: ../index.php?status=$status");
    exit();
}