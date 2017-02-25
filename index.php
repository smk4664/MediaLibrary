<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Media Library</title>
<link rel="stylesheet" href="images/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
</head>
<body>
<div class="logo">
    <h1><a href="#" title="A great Media Library!">Media <span class="red">Library</span></a></h1>
    <p>My Media Library</p>
</div>
<?php
require 'library/check-user.php';   // Require check-user.php (ALWAYS Use require For Important Files Such As This
echo $_SESSION['user'];
if ($admin == '1') {   // If User Is An Admin
?>
  
  <P align=right> Logged in as <?php echo "$user" ?>.
  <BR>
  <a href="library/logout.php">Logout</a>
  </p>
  <p>
  <a href="artistform.php">Add Artist</a>
  </p>
    <p>
  <a href="albumform.php">Add Album</a>
  </p>
  <p>
  <a href="search.php">Library</a>
  </p>
   <p>
  <a href="dropdown.php">Dropdown</a>
  </p>
 <?php 
} else if ($auth == '1') {   // If User Is Just A Regular User (Non-Admin)
  print 'Logged in as a user.';
  print '<br /><br />';
  print '<a href="library/logout.php">Logout</a>';
  ?>
  <p>
  <a href="search.php">Library</a>
  </p>
<?php 
} else {   // If No Cookies Are Set, Cookies Are Expired, Or Cookies Contain Invalid Username And/Or Password
  print '<br /><br />';
  print '<a href="library/login.php">Login</a>';
}
?>
</body>
</html>