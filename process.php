var_dump($_POST);<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FoodDetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
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














