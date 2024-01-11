<?php
  // Database credentials
  $host = "localhost"; // Change this to your host name or IP address
  $username = "root"; // Change this to your database username
  $password = ""; // Change this to your database password
  $dbname = "bike_service"; // Change this to your database name

  // Create connection
  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Handle accept and reject buttons
  if (isset($_POST["accept"])) {
      $id = $_POST["id"];
      $sql = "UPDATE service_requests SET status='accepted' WHERE id=$id";
      mysqli_query($conn, $sql);
  }

  if (isset($_POST["reject"])) {
      $id = $_POST["id"];
      $sql = "UPDATE service_requests SET status='rejected' WHERE id=$id";
      mysqli_query($conn, $sql);
  }

  // Fetch data from table
  $sql = "SELECT * FROM service_requests,customer_details WHERE customer_details.id=service_requests.id";
  $result = mysqli_query($conn, $sql);

  // Display data in HTML table
  if (mysqli_num_rows($result) > 0) {
      echo "<form method='post'>";
      echo "<style>
              table {
                border-collapse: collapse;
                width: 100%;
              }

              th, td {
                text-align: left;
                padding: 8px;
                border-bottom: 1px solid #ddd;
              }

              tr:nth-child(even) {
                background-color: #f2f2f2;
              }

              th {
                background-color: #4CAF50;
                color: white;
              }
            </style>";
      echo "<table>";
      echo "<tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Bike Model</th>
      <th>Service Type</th>
      <th>Service Date</th>
      <th>Created At</th>
      <th>Status</th>
      <th>Action</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
              <td>" . $row["id"] . "</td>
              <td>" . $row["name"] . "</td>
              <td>" . $row["email"] . "</td>
              <td>" . $row["phone"] . "</td>
              <td>" . $row["bike_model"] . "</td>
              <td>" . $row["service_type"] . "</td>
              <td>" . $row["service_date"] . "</td>
              <td>" . $row["created_at"] . "</td>
              <td>" . $row["status"] . "</td>
              <td>";

          if ($row["status"] == "Pending") {
              echo "<input type='hidden' name='id' value='" . $row["id"] . "'/>
                    <input type='submit' name='accept' value='Accept'/>
                    <input type='submit' name='reject' value='Reject'/>";
          }
          echo "</td></tr>";
      }
      echo "</table>";
      echo "</form>";
  } else {
      echo "No records found.";
  }

  // Close connection
  mysqli_close($conn);
?>
