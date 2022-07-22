<?php

@include 'config.php';
// error_reporting (0);
// define('MYSITE',true);


if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $phone_number = ($_POST['phone_number']);
   $roll_number =  mysqli_real_escape_string($conn,$_POST['roll_number']);
  //  $pass_check = password_verify($pass );


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' && name = '$name' && user_type = '$user_type' && phone_number = '$phone_number' ";

   $result = mysqli_query($conn, $select);

 
 if(empty($name))
 {
  $error[] = "Enter your fullname !";
   }
 {if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
      $error[] = "Only alphabets and whitespace are allowed.";  
                   
    }
          
  }
 
if(empty($email))
 {
  $error[] = "Enter your email !";
   }
 if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error[] = "Enter valid email id !";
   }
 if(empty($pass))
 {
  $error[] = "Enter your password";
  
 }

 if($cpass!=$pass)
 {
  $error[] = "Password and Confirm Password doesnot match";
   }
  if(empty($phone_number))
 {
  $error[] = "Enter your mobile number !";
   }
 if(!is_numeric($phone_number))
 {
  $error[] = "Mobile number must be numeric only!";
  $code = 2;
 }
  if(strlen($phone_number)!=10)
 {
  $error[] = "Mobile nuber should be 10 digit only!";

 }
else{
//Checking emailid and mobile number if already registered
$ret=mysqli_query($conn, "SELECT roll_number from user_form where email='$email' || password='$pass'");
$result=mysqli_fetch_array($ret);
if($result>0){
 $error[]= ('This email already associated with another account');
}
else{
$query=mysqli_query($conn,"INSERT into user_form(name,email,Password,user_type,phone_number,roll_number) values('$name','$email','$pass','$user_type','$phone_number','$roll_number')");
if($query){

header('location:login_form.php');
} else {
echo ('Something went wrong. Please try again.');

}
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
    <title>SIGN UP</title>
    <link rel="stylesheet" href="signupp.css">
   
</head>
<body>
    <div class="center">
    <h1>Sign Up</h1>
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
        
        <form action="" method="post" >
        
       
          <div class="txt_field" name="name" >
          <input type="text" name="name" >
            <!-- <b><span></span></b> -->
            <label>Enter Your Name</label>
          </div>
         
          <div class="txt_field" name="email" >
              <input type="email" name="email" >
              <!-- <b><span></span></b> -->
              <label>Enter Your Email</label>
          </div>
         
          <div class="txt_field" name="password" >
              <input type="password" name="password"  >
              <!-- <b><span></span></b> -->
              <label>Enter your Password</label>
          </div>
          <div class="txt_field"  name="cpassword" >
            <input type="password" name="cpassword" >
            <!-- <b></b> -->
            <label>Confirm  Password</label>
           </div>
           

           <div class="txt_field" name="user_type" >
            <!-- <input type="search"  required> -->
            <select  name="user_type">
              <option value="user" >user</option>
              <option value="admin">admin</option>
             
          </select>
            <span></span>
            <label ></label>
            
          </div>
          <div class="txt_field" name="phone_number" >
            <input type="number" name="phone_number" >
            <label>Phone Number</label>
           </div>
           <div class="txt_field" name="roll_number" >
            <input type="number" name="roll_number" >
            <label>Roll No.</label>
           </div>

          <center><input type="submit" name = "submit" value="Submit" ></center>
          
          <div class="signup_link">
              Already a Member?   <a href="login_form.php">Login here</a>
          </div>
      </form>
      
   
  </div>
</body>
</html>
