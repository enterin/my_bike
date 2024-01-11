<?php

include 'config.php';

session_start();

$error = array(); // Initialize an empty array for storing errors

if (isset($_POST['submit'])) {
   // Validate email
$email = $_POST['email'];
if (empty($email)) {
    $error[] = 'Email address is required!';
} elseif (strlen($email) > 100) {
    $error[] = 'Email address exceeds the maximum length of 100 characters!';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = 'Invalid email address!';
}


    // Validate password
    $password = $_POST['password'];
    if (strlen($password) < 8) {
        $error[] = 'Password must be at least 8 characters long!';
    }

    if (empty($error)) { // Proceed only if there are no validation errors
        $select = "SELECT * FROM customerdetails WHERE email = '" . mysqli_real_escape_string($conn, $email) . "' AND password = '" . md5(mysqli_real_escape_string($conn, $password)) . "'";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_id'] = $row['id'];
                header('location:acceptreject.php');
                // exit();

            } elseif ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['Email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];

                header('location:index1.php');
                // exit();
            }
        } else {
            $error[] = 'Incorrect email or password!';
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
   <title>Login Form</title>
   
   <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style media="screen">
  *,
  *:before,
  *:after {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #080710;
  }

  .background {
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
  }

  .background .shape {
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
    animation: shapeAnimation 3s ease-in-out infinite;
  }

  .shape:first-child {
    background: linear-gradient(#1845ad, #23a2f6);
    left: -80px;
    top: -80px;
  }

  .shape:last-child {
    background: linear-gradient(to right, #ff512f, #f09819);
    right: -30px;
    bottom: -80px;
  }

  @keyframes shapeAnimation {
    0% {
      transform: rotate(0);
    }
    50% {
      transform: rotate(180deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }

  form {
    height: 520px;
    width: 400px;
    background-color: rgba(255, 255, 255, 0.13);
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    padding: 50px 35px;
  }

  form * {
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
  }

  form h3 {
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
  }

  label {
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
  }

  input {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
  }

  ::placeholder {
    color: #e5e5e5;
  }

  button {
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

  .social {
    margin-top: 30px;
    display: flex;
  }

  .social div {
    background: red;
    width: 150px;
    border-radius: 3px;
    padding: 5px 10px 10px 5px;
    background-color: rgba(255, 255, 255, 0.27);
    color: #eaf0fb;
    text-align: center;
  }

  .social div:hover {
    background-color: rgba(255, 255, 255, 0.47);
  }

  .social .fb {
    margin-left: 25px;
  }

  .social i {
    margin-right: 4px;
  }
</style>

</head>
<body>
   <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
   </div>

   <div class="form-container">
      <form action="" method="post">
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" id="password" required placeholder="Enter your password">
         <input type="checkbox" id="show-password">
         <label for="show-password">Show Password</label>
         <button type="submit" name="submit" class="form-btn">Login Now</button>
         <br>
         <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
         <div class="social">
            <div class="go"><i class="fab fa-google"></i>  Google</div>
            <div class="fb"><i class="fab fa-facebook"> </i>  Facebook</div>
         </div>
      </form>
   </div>

   <script>
      const passwordInput = document.getElementById('password');
      const showPasswordCheckbox = document.getElementById('show-password');

      showPasswordCheckbox.addEventListener('change', function () {
         const showPassword = showPasswordCheckbox.checked;
         passwordInput.type = showPassword ? 'text' : 'password';
      });
   </script>
</body>
</html>
