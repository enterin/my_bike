<?php
// Assuming you have a database connection
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

// Query to fetch service details
$sql = "SELECT * FROM task_info";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output header
    echo "Bike Service Report\n";
    echo "----------------------------------\n";
    echo "Service ID | Bike ID | Service Type | Service Date | Details\n";
    echo "----------------------------------\n";

    // Output data from each row
    while($row = $result->fetch_assoc()) {
        echo $row["service_id"] . " | " . $row["bike_id"] . " | " . $row["service_type"] . " | " . $row["service_date"] . " | " . $row["details"] . "\n";
    }
} else {
    echo "No results found";
}

// Close the database connection
$conn->close();
?>
