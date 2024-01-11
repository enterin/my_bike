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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            padding: 20px 0;
            margin: 0;
            background-color: #3498db;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        select, input[type="submit"] {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }
        select {
            width: 100px;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        td form {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Service Requests</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Bike Model</th>
            <th>Service Type</th>
            <th>Service Date</th>
            <th>Service price</th>
            <th>Service time</th>   
            <th>Created At</th>
            
            <th>Action</th>
        </tr>

        <?php
        // Loop through the result set and output the data
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['bike_model'] . "</td>";
                echo "<td>" . $row['service_type'] . "</td>";
                echo "<td>" . $row['service_date'] . "</td>";
                echo "<td>" . $row['service_price'] . "</td>"; 
                echo "<td>" . $row['service_time'] . "</td>";  
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
            echo "<tr><td colspan='7'>No service requests found.</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
// Close the database connection
$mysqli->close();
?>
