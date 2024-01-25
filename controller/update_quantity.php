<?php
// update_quantity.php

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "grocery_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the request
$data = json_decode(file_get_contents("php://input"));

// Sanitize and validate data (you should implement proper validation and sanitation)
$index = $conn->real_escape_string($data->index);
$quantity = $conn->real_escape_string($data->quantity);

// Update the database
$sql = "UPDATE `add_to_cart` SET quantity = '$quantity' WHERE id = '$index'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
