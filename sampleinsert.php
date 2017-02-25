<?php
// Include Database Connection Files
	include 'library/inconfig.php';
	include 'library/connectdb.php';

// Set variable for Artist Instert
	$artistinsert = $_POST['Artist'];
	
// trim whitespace from artist
   $artistinsert = trim($artistinsert);
	$artistinsert = preg_replace("/\s+/", " ", $artistinsert);

// Check to see if proper artistinsert
	if (($artistinsert == NULL or $artistinsert == "%")){
	echo "<center><b><FONT COLOR=\"red\">Artist name cannot be blank.</font></b><br /></center>";
	}
	
	else {
// Set Query 
	$sqlinsert = "INSERT INTO persons (name) VALUES ('$artistinsert')";

// Execute the query
	mysql_query($sqlinsert) or die(mysql_error());
	
// Echo 
echo "Artist has been added";
	}
// Close connection
include 'library/closedb.php';
?> 