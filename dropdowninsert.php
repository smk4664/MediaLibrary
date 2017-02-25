<?php

// Set variable for Dropdown Instert
	$albumdropinsert = $_POST['Album'];
	$artistdropinsert = $_POST['Artist'];
	$trackdropinsert = $_POST['Track'];
	
// trim whitespace from Track
   $trackdropinsert = trim($trackdropinsert);
	$trackdropinsert = preg_replace("/\s+/", " ", $trackdropinsert);

// Check to see if proper albuminsert
	if (($trackdropinsert == NULL or $trackdropinsert == "%")){
	echo "<center><b><FONT COLOR=\"red\">Album name cannot be blank.</font></b><br /></center>";
	}
// Echo 
echo "$albumdropinsert";
echo "$artistdropinsert";
echo "$trackdropinsert";
?>
