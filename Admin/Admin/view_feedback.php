<!DOCTYPE html>
<html>
<head>
    <title>Customer Feedback</title>
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

    // Fetch feedback entries from the database
    $sql = "SELECT * FROM customer_feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Customer Feedback</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["feedback_id"] . "</td>";
            echo "<td>" . $row["customer_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["feedback_text"] . "</td>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["feedback_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No feedback entries yet.</h2>";
    }

    $conn->close();
    ?>
</body>
</html>
