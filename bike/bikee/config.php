<?php
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'database_name';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
