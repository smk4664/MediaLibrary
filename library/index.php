<?
require 'check-user.php';   // Require check-user.php (ALWAYS Use require For Important Files Such As This
if ($admin == '1') {   // If User Is An Admin
  print 'Logged in as a admin.';
  print '<br /><br />';
  print '<a href="logout.php">Logout</a>';
} else if ($auth == '1') {   // If User Is Just A Regular User (Non-Admin)
  print 'Logged in as a user.';
  print '<br /><br />';
  print '<a href="logout.php">Logout</a>';
} else {   // If No Cookies Are Set, Cookies Are Expired, Or Cookies Contain Invalid Username And/Or Password
  print 'NOT logged in.';
  print '<br /><br />';
  print '<a href="login.php">Login</a>';
}
?>