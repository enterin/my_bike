<?php
// Establish a connection to the database
$host = "localhost";
$user = "root";
$password = "";
$database = "bike_service";

// Create a new mysqli instance
$mysqli = new mysqli($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestId = $_POST['request_id'];
    $status = $_POST['status'];

    // Update the status in the database
    $updateSql = "UPDATE servicerequests SET status = '$status' WHERE id = $requestId";
    if ($mysqli->query($updateSql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $mysqli->error;
    }
}

// Fetch data from the servicerequests table (excluding accepted and rejected requests)
$sql = "SELECT * FROM servicerequests WHERE status NOT IN ('accepted', 'rejected')";
$result = $mysqli->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
<title>Service Requests</title>
    <style>
        body {
            position: relative;
            height: 100vh;
            background-color: #f7f7f7;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            background: linear-gradient(to bottom, #ff9a9e, #fad0c4, #fad0c4, #ffd1ff);
            z-index: -1;
            animation: background-animation 20s linear infinite;
        }

        .container {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 36px;
            animation: title-animation 2s ease infinite;
        }

        table {
            width: 80%; /* Adjust the width as per your requirement */
            margin: 0 auto; /* Center the table horizontally */
            border-collapse: collapse;
            border: 2px solid #000; /* Add a border to the table */
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #000; /* Add borders to cells */
            padding: 8px; /* Add padding to cells */
            text-align: center;
        }

        th {
            background-color: #f2f2f2; /* Gray background for table header */
        }

        .highlight {
            background-color: #87CEEB;
            animation: highlight-row 0.5s infinite alternate;
        }
    </style>
</head>
<body>  
    <div class="container">
        <h1>Service Requests</h1>
    </div>
    <table>
        
        <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Bike Model</th>
            <th>Service Type</th>
            <th>Service Date</th>
            <th>Service Time</th> <!-- New column header for Service Time -->
            <th>Created At</th>
            <th>Action</th>
        </tr>

        <?php
        // Loop through the result set and output the data
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='highlight'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['bike_model'] . "</td>";
                echo "<td>" . $row['service_type'] . "</td>";
                echo "<td>" . $row['service_date'] . "</td>";
                echo "<td>" . $row['service_time'] . "</td>"; // Display Service Time
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
                echo "<select name='status'>";
                echo "<option value='pending'>Pending</option>";
                echo "<option value='accepted'>Accepted</option>";
                echo "<option value='rejected'>Rejected</option>";
                echo "</select>";
                echo "<input type='submit' value='Submit'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No service requests found.</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
// Close the database connection
$mysqli->close();
?>