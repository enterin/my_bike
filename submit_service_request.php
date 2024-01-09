



<?php
session_start();
// Database credentials
$host = "localhost";
$user = "root";
$password = "";
$database = "bike_service";

// Create a connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$phone = $_POST['phone'];
$bike_model = $_POST['bike_model'];
$service_type = $_POST['service_type'];
$service_price=$_POST['service_price'];
$service_date = $_POST['service_date'];
$service_time = $_POST['service_time'];
$id = $_SESSION['user_id'];
?>

<?php 
    // session_start();
    // if (isset($_SESSION['user_name']) && isset($_SESSION['user_id']) && ){
    //     $username = $_SESSION['user_name'];
    //     $userid = $_SESSION['user_id'];
    //     $email = $_SESSION['email'];
    // } else {
    //     echo "";
    // }

?>

<?php 

    if (isset($_SESSION['user_name']) || isset($_SESSION['Email'])){
        $username = $_SESSION['user_name'];
        // $userid = $_SESSION['user_id'];
        $email = $_SESSION['Email'];

         // Prepare SQL query
         $sql = "INSERT INTO servicerequests (phone, bike_model, service_type, service_date,service_price,
         service_time, user_gmail)
         VALUES ('$phone', '$bike_model', '$service_type','$service_date', $service_price, '$service_time', '$email' )";

            // Execute query0
            if (mysqli_query($conn, $sql)) {
                echo "Service request submitted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }


    } else {
        header('location:login_form.php');
    }


  

?>



