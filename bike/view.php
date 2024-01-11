<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bike_service";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM servicerequests";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Requests Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #3498db, #c0392b);
            animation: background-animation 20s ease-in-out infinite;
        }

        @keyframes background-animation {
            0% {
                background-position: 0 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0 50%;
            }
        }

        h2 {
            text-align: center;
            padding: 20px 0;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h2>Service Requests Status</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Bike Model</th>
            <th>Service Type</th>
            <th>Service Date</th>
            <th>Service price</th>
            <th>Service time</th>  
            <th>Status</th>
            <th>Created At</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['bike_model'] . "</td>";
                echo "<td>" . $row['service_type'] . "</td>";
                echo "<td>" . $row['service_date'] . "</td>";
                echo "<td>" . $row['service_price'] . "</td>";
                echo "<td>" . $row['service_time'] . "</td>"; 
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No service requests found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
