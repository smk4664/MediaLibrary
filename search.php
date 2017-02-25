<html>
<head>
<title>Search</title>
<link rel="stylesheet" href="template/sample.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<div style="text-align: center">Media Library</div><?php
require 'library/check-user.php';   // Require check-user.php (ALWAYS Use require For Important Files Such As This
if ($admin == '1') {   // If User Is An Admin 
  ?>
  <P align=right> Logged in as <?php echo "$user" ?>.
  <BR>
  <a href="library/logout.php">Logout</a>
  </p>
  <?php
// Select search form
	echo '<form name="formradio" method="post" action="mediasearch.php">';
	echo '<table border="0" align="center" cellpadding="5" cellspacing="0">';
	echo '<tr>';
    echo '<td align="right" valign="middle">Search:</td>';
    echo '<td><input type="radio" name="search" value="artist"> Artist<br>';
    echo '<input type="radio" name="search" value="album"> Album<br>';
    echo '<input type="radio" name="search" value="song"> Song Title</td>';
	echo '<td><input type="text" input name="txtSearch" id="txtSearch"</td>';
	echo '<td><input name="btnSubmit" type="submit" id="btnSubmit" value="Submit"></td>';
    echo '</tr>';
    ?>
 <?php 
} else if ($auth == '1') {   // If User Is Just A Regular User (Non-Admin)
?>
  <P align=right> Logged in as <?php echo "$user" ?>.
  <BR>
  <a href="library/logout.php">Logout</a>
  </p>
  <?php
  // Select search form
	echo '<form name="formradio" method="post" action="mediasearch.php">';
	echo '<table border="0" align="center" cellpadding="5" cellspacing="0">';
	echo '<tr>';
    echo '<td align="right" valign="middle">Search:</td>';
    echo '<td><input type="radio" name="search" value="artist"> Artist<br>';
    echo '<input type="radio" name="search" value="album"> Album<br>';
    echo '<input type="radio" name="search" value="song"> Song Title</td>';
	echo '<td><input type="text" input name="txtSearch" id="txtSearch"</td>';
	echo '<td><input name="btnSubmit" type="submit" id="btnSubmit" value="Submit"></td>';
    echo '</tr>';
  ?>
<?php 
} else {   // If No Cookies Are Set, Cookies Are Expired, Or Cookies Contain Invalid Username And/Or Password  print '<br /><br />';
  print '<a href="library/login.php">Login</a>';
}
?>
</body>
</html>