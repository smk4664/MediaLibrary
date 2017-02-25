<?php
session_start();
include '/usr/lib/MediaLibrary/config.php';
include 'connectdb.php';

if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {   // Checking To See If Cookies Exist And If They're Good - Need to change to sessions, not sure on this yet.
    $user = $_SESSION['user'];   // Setting The $user Variable
    $pass = $_SESSION['pass'];   // Setting The $pass Variable
    $logincheck2 = mysqli_query($con,"SELECT * FROM users WHERE username='$user' AND password='$pass'");   // Run A Query To See If The Username And Password Are Valid
    $logincheck = mysqli_num_rows($logincheck2);   // Number Of Results Of The Query
    if ($logincheck > '0') {   // If One Or More Users Were Found
        $auth = '1';   // Valid User, Set $auth To 1
  //  setcookie("username", $user, time()+60*60*24*30, "/", "media.ntxmc.com", 0);   // Setting The Cookie
  //  setcookie("password", $pass, time()+60*60*24*30, "/", "media.ntxmc.com", 0);   // Setting The Cookie
        $admincheck2 = mysqli_query($con,"SELECT * FROM users WHERE username='$user' AND password='$pass' AND admin='1'");   // Run A Query To See If The User Is An Admin
        $admincheck = mysqli_num_rows($admincheck2);   // Number Of Results Of The Query
        if ($admincheck > '0') {   // If One Or More Users Were Found
            $admin = '1';   // User Is An Admin, Set $admin To 1
        } else {
            $admin = '0';   // User Not An Admin, Set $admin To 0
        }
  } else {
    $admin = '0';   // Invalid User, Set $admin To 0
    $auth = '0';   // Invalid User, Set $auth To 0
  }
} else {
  $admin = '0';   // Invalid User, Set $admin To 0
  $auth = '0';   // Invalid User, Set $auth To 0
}

mysqli_close($con);   // Closing The Connection
?>
