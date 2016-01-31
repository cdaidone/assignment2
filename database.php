<?php

$server = "localhost";
$database = "carinada_ddssales";
$username = "";
$password = "";
$conn = mysqli_connect("localhost", "", "", "carinada_ddssales");


if (!$conn) {
    echo "Error: Unable to connect to database.";
    echo "Debugging errno: " . mysqli_connect_errno();
    echo "Debugging error: " . mysqli_connect_error();
    exit;
}
?>
