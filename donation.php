<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donorInfo";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS donorInfo";
if ($conn->query($createDatabaseQuery) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Use the created database
$conn->select_db($dbname);

// Create a table to store donor details
$createTableQuery = "CREATE TABLE IF NOT EXISTS donorDetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donorName VARCHAR(255) NOT NULL,
    donorEmail VARCHAR(255) NOT NULL,
    donorPhone VARCHAR(20) NOT NULL,
    donorAddress VARCHAR(255) NOT NULL,
    foodName VARCHAR(255) NOT NULL,
    foodType VARCHAR(255) NOT NULL,
    foodQuantity INT NOT NULL,
    pickupOption VARCHAR(20) NOT NULL
)";
if ($conn->query($createTableQuery) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Retrieve data from the form using prepared statements
$donorName = isset($_POST['donor-name']) ? $_POST['donor-name'] : '';
$donorEmail = isset($_POST['donor-email']) ? $_POST['donor-email'] : '';
$donorPhone = isset($_POST['donor-phone']) ? $_POST['donor-phone'] : '';
$donorAddress = isset($_POST['donor-address']) ? $_POST['donor-address'] : '';
$foodName = isset($_POST['food-name']) ? $_POST['food-name'] : '';
$foodType = isset($_POST['food-type']) ? $_POST['food-type'] : '';
$foodQuantity = isset($_POST['food-quantity']) ? $_POST['food-quantity'] : '';
$pickupOption = isset($_POST['pickup-option']) ? $_POST['pickup-option'] : '';

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO donorDetails (donorName, donorEmail, donorPhone, donorAddress, foodName, foodType, foodQuantity, pickupOption) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("ssssssss", $donorName, $donorEmail, $donorPhone, $donorAddress, $foodName, $foodType, $foodQuantity, $pickupOption);

// Execute the statement
if ($stmt->execute()) {
    echo "Record added successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>


    














