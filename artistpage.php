<html>
<head>
<title>Artist Page</title>
<link rel="stylesheet" href="template/sample.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
// Include Database Connection Files
	include 'library/config.php';
	include 'library/connectdb.php';
	
// Get variable from URL
	$artist = $_GET['artist'];

// Assign the Query
	$query = "SELECT DISTINCT albums.name AS 'Album', pictures.desc AS 'Picture', pages.desc AS 'Pages', artists.name AS 'Artist' FROM medias, artists, albums, pictures, pages WHERE medias.album = albums.id AND medias.artist = artists.id AND pictures.id = artists.id AND pages.id = albums.id AND artists.name = '$artist' ORDER BY albums.name";

// Execute the Query
	$result = mysql_query($query) or die(mysql_error());
		
// Fetch the Results
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$album = $row["Album"];
		$picture = $row["Picture"];
		$pages = $row["Pages"];
		
		// Display Picture
		echo "<img src='$picture' align = 'top'>";
		echo "<p>";
		
		//Display info
		echo "<a href='albumpage.php$pages'>$album</a>";
		echo "<p>";
		}
?>
</body>
</html>