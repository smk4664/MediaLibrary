<html>
<head>
<title>Dropdown</title>
<link rel="stylesheet" href="template/sample.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<?php

// Checks to see if user is authorized to view the page
require 'library/check-user.php';   // Require check-user.php
if ($admin == '1') {   // If User Is An Admin
  print 'Logged '.$user.' in as an admin.';
  print '<br /><br />';
  print '<a href="library/logout.php">Logout</a>';
  
// Include Database Connection Files
	include '/usr/lib/MediaLibrary/inconfig.php';
	include 'library/connectdb.php';

$albumquery="SELECT id, name FROM albums";
$albumresult=mysqli_query($con, $albumquery);


$artistsquery="SELECT id, name FROM artists"; 
$artistsresult=mysqli_query($con, $artistsquery);

?> 

<form action="dropdowninsert.php" method="post">
<SELECT NAME=Album>
    <Option Value=0>Album</option>
    <?php
        while ($albumrow = mysqli_fetch_array($albumresult, MYSQLI_ASSOC))
        {
            echo "<option value=".$albumrow['id'].">".$albumrow['name']."</option>";
        } 
    ?>
</SELECT> 
<Select NAME=Artist>
    <Option Value=0>Artist</option>
    <?php
    while ($artistsrow = mysqli_fetch_array($artistsresult, MYSQLI_ASSOC))
    {
        echo "<option value=".$artistsrow['id'].">".$artistsrow['name']."</option>";
    }
    ?>
</select>
Track: <input type="text" name="Track" />
<input type="submit" />
</form>

 <?php 
} else if ($auth == '1') {   // If User Is Just A Regular User (Non-Admin)
  print 'Logged in as a user.';
  print '<br /><br />';
  print '<a href="library/logout.php">Logout</a>';
  ?>

<?php 
} else {   // If No Cookies Are Set, Cookies Are Expired, Or Cookies Contain Invalid Username And/Or Password
  print '<br /><br />';
  print '<a href="library/login.php">Login</a>';
}
?>
</body>
</html>
