<?php
// session_start();
// include('secuirity.php');

// if (!isset($_SESSION['username'])) 
// {
//     header('Location: login.php');
//     // exit(0);
// }

if (!isset($_SESSION['name'])) 
{
    $_SESSION['status'] = "Login to access";
        $_SESSION['status_code'] = "error";
        header('Location: login_form.php');
    // header('Location: login.php');
    exit(0);
}



// if(!$_SESSION['username'])
// {
//     header('Location: login.php');
// }
// else
// {
//     if($usertypes['usertype'] !== "admin")
//     {
//         $_SESSION['status'] = "Email / Password is Invalid";
//         header('Location: login.php');
//         exit(0);
//     }
// }



?>
