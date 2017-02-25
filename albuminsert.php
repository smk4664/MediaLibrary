<?php

require 'library/check-user.php';   // Require check-user.php (ALWAYS Use require For Important Files Such As This
if ($admin == '1') {   // If User Is An Admin
  print 'Logged in as an admin.';
  print '<br /><br />';
  print '<a href="library/logout.php">Logout</a>';
  
// Include Database Connection Files
	include '/usr/lib/MediaLibrary/inconfig.php';
	include 'library/connectdb.php';

// Set variable for Album Instert
	$albuminsert = $_POST['Album'];
	
// trim whitespace from album
   $albuminsert = trim($albuminsert);
	$albuminsert = preg_replace("/\s+/", " ", $albuminsert);

// Check to see if proper albuminsert
	if (($albuminsert == NULL or $albuminsert == "%")){
	echo "<center><b><FONT COLOR=\"red\">Album name cannot be blank.</font></b><br /></center>";
	}
	
	else {
// Set Query 
	$sqlinsert = "INSERT INTO albums (name) VALUES ('$albuminsert')";

// Execute the query
	mysqli_query($con, $sqlinsert) or die(mysqli_error($con));
	
// Echo 
echo "Artist has been added";
	}
// Close connection
include 'library/closedb.php';
} else if ($auth == '1') {   // If User Is Just A Regular User (Non-Admin)
  print 'Logged in as a user, must be an admin';
  print '<br /><br />';
  print '<a href="library/login.php">Login</a>';
} else {   // If No Cookies Are Set, Cookies Are Expired, Or Cookies Contain Invalid Username And/Or Password
  print 'NOT logged in.';
  print '<br /><br />';
  print '<a href="library/login.php">Login</a>';
}

?> 