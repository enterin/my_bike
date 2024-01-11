<!DOCTYPE html>
<html>
  <head>
    <title>Bike Service Request Form</title>
  </head>
  <body>
    <h1>Bike Service Request</h1>
    <form method="POST" action="submit_request.php">
      <label for="request_id">Request ID:</label>
      <input type="text" id="request_id" name="request_id"><br><br>
      
      <label for="customer_id">Customer ID:</label>
      <input type="text" id="customer_id" name="customer_id"><br><br>
      
      <label for="request_date">Request Date:</label>
      <input type="date" id="request_date" name="request_date"><br><br>
      
      <label for="bike_model">Bike Model:</label>
      <input type="text" id="bike_model" name="bike_model"><br><br>
      
      <label for="service_description">Description of Service Required:</label><br>
      <textarea id="service_description" name="service_description" rows="5" cols="30"></textarea><br><br>
      
      <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $request_id = $_POST['request_id'];
        $customer_id = $_POST['customer_id'];
        $request_date = $_POST['request_date'];
        $bike_model = $_POST['bike_model'];
        $service_description = $_POST['service_description'];

        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bike_service";

        $conn = mysqli_connect("localhost", "root", "", "bike_service");


        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert the data into the database
        $sql = "INSERT INTO servicerequests (request_id, customer_id, request_date, bike_model, service_description)
                VALUES ('$request_id', '$customer_id', '$request_date', '$bike_model', '$service_description')";

        if (mysqli_query($conn, $sql)) {
            echo "Service request submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
  </body>
</html>
