<?php
include ("config.php");
error_reporting (0);
$rn = $_GET ['rn'];
$fn = $_GET ['fn'];
$em = $_GET ['em'];
$pn = $_GET ['pn'];
$ut = $_GET ['ut'];
?>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signupp.css">
   
</head>
<body>
    <div class="center">
        <h1>EDIT</h1>
        <form action="" method="post" >
          <div class="txt_field" name="name" >
          <input type="text" value="<?php echo "$fn" ?>" name="name" required>
            <!-- <b><span></span></b> -->
            <label> Name</label>
          </div>
         
          <div class="txt_field" name="email" >
              <input type="email" value="<?php echo "$em" ?>" name="email" required>
              <!-- <b><span></span></b> -->
              <label> Email</label>
          </div>
         
          <div class="txt_field" name="phone_number" >
            <input type="number" value="<?php echo "$pn" ?>" name="phone_number" required>
            <label>Phone Number</label>
           </div>
           <div class="txt_field" name="roll_number" >
            <input type="number" value="<?php echo "$rn" ?>" name="roll_number" required>
            <label>Roll No.</label>
           </div>
           <div class="txt_field" value="<?php echo "$ut" ?>" name="user_type" >
            <!-- <input type="search"  required> -->
            <select  name="user_type">
              <option value="user" >user</option>
              <option value="admin">admin</option>
             
           </select>
            <span></span>
            <label ></label>
            
          </div>

          <center><input type="submit" name ="submit" value="Update Details" ></center>
          
      </form>
      
   
  </div>
</body>
</html>
<?php

if ($_POST['submit'])
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $roll_number = $_POST['roll_number'];
  $user_type =  $_POST['user_type'];
  $query ="UPDATE user_form SET roll_number='$roll_number',name='$name', email='$email',phone_number='$phone_number',user_type ='$user_type' WHERE roll_number='$roll_number' ";
  $data =mysqli_query($conn,$query);
if($data)
{
 echo "<script>alert ('Record Updated')</script>";
 ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL= http://localhost/project1/admin_page.php  ">    
<?php
}
else 
{
  echo "Failed to Update Record";
}
}

?>