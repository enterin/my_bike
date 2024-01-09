<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bike_service";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$feedback_text = $_POST['feedback_text'];
$rating = $_POST['rating'];

// Prepare SQL statement to insert feedback into the database
$sql = "INSERT INTO customer_feedback (customer_name, email, feedback_text, rating) VALUES ('$customer_name', '$email', '$feedback_text', '$rating')";

if ($conn->query($sql) === TRUE) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
