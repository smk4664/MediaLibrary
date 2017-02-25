<?php

include 'config.php';
include 'connectdb.php';

if (!isset($_GET['subpage'])) {   // If No Subpage Is Specified
  if (isset($_GET['error']) && $_GET['error'] == '1') {   // If An Error Is Set And Is Set To 1
  ?>
<font color="#FF0000"><b>ERROR: </b>Invalid username and/or password. Please try again.</font>
  <?php } ?>
<form method="post" action="login.php?subpage=login">
Username:<br />
<input type="text" name="user">
<br /><br />
Password:<br />
<input type="password" name="pass">
<br /><br />
<input type="submit" name="login" value="Login">
</form>
<?php
} else if (isset($_GET['subpage']) && $_GET['subpage'] == 'login') {   // If A Subpage Is Specified And Set To login
  
  $user = $_POST['user'];   // Setting The Variable (Always Use Different Variable Names Than What Is In Your HTML Forms)
  $pass = md5($_POST['pass']);   // Setting The Variable (Always Use Different Variable Names Than What Is In Your HTML Forms - Password Should Also Always Be MD5 Encrypted)
  $usercheck2 = mysqli_query($con, "SELECT * FROM users WHERE username='$user' AND password='$pass'");   // Check If Any Users Match Username & Password Entered
  $usercheck = mysqli_num_rows($usercheck2);   // Number Of Results Of The Query
  if ($usercheck > '0') {   // If One Or More Users Were Found
    setcookie("user", $user, time()+60*60*24*30, "/", "media.ntxmc.com", 0);   // Setting The Cookie - Need to change this to Session
    setcookie("pass", $pass, time()+60*60*24*30, "/", "media.ntxmc.com", 0);   // Setting The Cookie - Need to remove this line when changing to session
    header("Location: ../index.php");   // Redirect To index.php
  } else {
    header("Location: login.php?error=1");   // Redirect Back To The Login Form With An Error
  }
  
  mysqli_close($con);   // Closing The Connection
}
?>
