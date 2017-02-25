<?php
require 'library/check-user.php';   // Require check-user.php (ALWAYS Use require For Important Files Such As This
if ($admin == '1') {   // If User Is An Admin
?>  
  <P align=right> Logged in as <?php echo "$user" ?>.
  <BR>
  <a href="library/logout.php">Logout</a>
  </p>
 <html>
<body>


<form action="artistinsert.php" method="post">
Artist: <input type="text" name="Artist" />
<input type="submit" />
</form>
</body>
</html>

<?php 
} else if ($auth == '1') {   // If User Is Just A Regular User (Non-Admin)
  print 'Logged in as a user.';
  print '<br /><br />';
  print '<a href="library/login.php">Login</a>';
} else {   // If No Cookies Are Set, Cookies Are Expired, Or Cookies Contain Invalid Username And/Or Password
  print 'NOT logged in.';
  print '<br /><br />';
  print '<a href="library/login.php">Login</a>';
}
?>