<?php

include 'config.php';

$error = array(); // Initialize an empty array for storing errors

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];
   $cpass = $_POST['cpassword'];
   $user_type = $_POST['user_type'];

   // Validate name
if (empty($name)) {
    $error[] = 'Name is required!';
} elseif (strlen($name) < 2) {
    $error[] = 'Name must be at least 2 characters long!';
} elseif (strlen($name) > 50) {
    $error[] = 'Name exceeds the maximum length of 50 characters!';
} elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
    $error[] = 'Name can only contain letters and spaces!';
}


   // Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = 'Invalid email address!';
} elseif (strlen($email) > 100) { // Check maximum length
    $error[] = 'Email address is too long!';
} elseif (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) { // Check for a specific pattern
    $error[] = 'Invalid email address format!';
}


   // Validate password
if (strlen($password) < 8) {
    $error[] = 'Password must be at least 8 characters long!';
} elseif (!preg_match('/[A-Z]/', $password)) {
    $error[] = 'Password must contain at least one uppercase letter!';
} elseif (!preg_match('/[a-z]/', $password)) {
    $error[] = 'Password must contain at least one lowercase letter!';
} elseif (!preg_match('/[0-9]/', $password)) {
    $error[] = 'Password must contain at least one digit!';
} elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
    $error[] = 'Password must contain at least one special character!';
}



   // Validate confirm password
   if ($password !== $cpass) {
       $error[] = 'Passwords do not match!';
   }

   if (empty($error)) { // Proceed only if there are no validation errors
       $pass = md5($password);

       $select = "SELECT * FROM customerdetails WHERE email = '$email' AND password = '$pass'";
       $result = mysqli_query($conn, $select);

       if (mysqli_num_rows($result) > 0) {
           $error[] = 'User already exists!';
       } else {
           $insert = "INSERT INTO customerdetails(name, email, password, user_type) VALUES('$name','$email','$pass','user')";
           mysqli_query($conn, $insert);
           header('location: login_form.php');
           exit();
       }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style1.css"> -->
 <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

<body>
   
<div class="form-container">

   <form action="" method="post">   
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <!-- <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select> -->
    <button type="submit" name="submit" class="form-btn">Register</button>
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>