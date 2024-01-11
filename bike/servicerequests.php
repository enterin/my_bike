<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bike_service";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the servicerequests table
$sql = "SELECT * FROM servicerequests";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Requests</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Service Requests</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Bike Model</th>
            <th>Service Type</th>
            <th>service time</th>
            <th>Service Date</th>
            
            <th>Status</th>
            <th>Created At</th>
        </tr>

        <?php
        // Loop through the result set and output the data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['bike_model'] . "</td>";
                echo "<td>" . $row['service_type'] . "</td>";
                echo "<td>" . $row['service_time'] . "</td>";
                echo "<td>" . $row['service_date'] . "</td>";
                
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No service requests found.</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
