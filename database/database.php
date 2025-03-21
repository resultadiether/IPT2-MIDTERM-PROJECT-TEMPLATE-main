<?php
$Servername="localhost";
$Username="root";
$Password="";
$Database="ipt2_midterm_project";

$conn=new mysqli(hostname: "$Servername", username: "$Username", password: "$Password", database: "$Database");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

echo "Connected Successfully";
?>

