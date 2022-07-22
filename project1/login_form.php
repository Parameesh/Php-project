<?php


@include 'config.php';
error_reporting(0);

session_start();

if (isset($_POST['submit'])) {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);
  $user_type = $_POST['user_type'];

  $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);

    if ($row['user_type'] == 'admin') {

      $_SESSION['admin_name'] = $row['name'];
      header('location:admin_page.php');
    } elseif ($row['user_type'] == 'user') {

      $_SESSION['user_name'] = $row['name'];
      header('location:user_page.php');
    }
  }

  if (empty($email)) {
    $error[] = 'enter email!';
  } else {
    $email = $_POST["email"];
    if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
      $error[] = "Email is not valid.";
    }
  }
  if (empty($pass)) {
    $error[] = 'enter password';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="loginn.css">
</head>

<body>



  <div class="center">
    <h1>Login</h1>
    <?php
   
    if (isset($error)) {
      foreach ($error as $error) {
        echo '<span class="error-msg">' . $error . '</span>';
      };
    };
    ?>
    <form action="" method="post">


      <div class="txt_field">
        <input type="text" name="email">
        <span></span>
        <label>Email</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password">
        <span></span>
        <label>Password</label>
      </div>
      <div class="pass"><a href="Forget.html" target="_blank">Forgot Password?</a></div>
      <center><input type="submit" name="submit" value="Login"></center>

      <div class="signup_link">
        Not a member? <a href="register_form.php">Signup</a>
      </div>
    </form>
  </div>
</body>

</html>