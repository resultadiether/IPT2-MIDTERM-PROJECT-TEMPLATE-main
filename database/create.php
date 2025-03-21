<?php
session_start();
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

    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "Add order successfully";
    } else {
        $_SESIION['status_code'] = "Error";  
    }

    mysqli_close($conn);
    header("Location: ../index.php");
    exit();
}

?>