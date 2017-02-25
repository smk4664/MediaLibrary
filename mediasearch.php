<?php
// Include Database Connection Files
	include 'library/config.php';
	include 'library/connectdb.php';
	
// Select search form
	echo '<form name="formradio" method="post" action="">';
	echo '<table border="0" align="center" cellpadding="5" cellspacing="0">';
	echo '<tr>';
    echo '<td align="right" valign="middle">Search:</td>';
    echo '<td><input type="radio" name="search" value="artist"> Artist<br>';
    echo '<input type="radio" name="search" value="album"> Album<br>';
    echo '<input type="radio" name="search" value="song"> Song Title</td>';
	echo '<td><input type="text" input name="txtSearch" id="txtSearch"</td>';
	echo '<td><input name="btnSubmit" type="submit" id="btnSubmit" value="Submit"></td>';
    echo '</tr>';
	
// Set variable for search string
	$searchstring = $_POST['txtSearch'];
	
//trim whitespace from artist
    $searchstring = trim($searchstring);
	$searchstring = preg_replace("/\s+/", " ", $searchstring);

// Sets switch so that different searches come up.
	switch($_POST['search']){ /* Open switch */
            case 'artist':
				// Assign the query
						$query = "SELECT tracks.number AS 'Track #', medias.title AS 'Title', artists.name AS 'Artist', albums.name AS 'Album', links.desc AS 'Link' FROM tracks, medias, artists, albums, links WHERE medias.artist = artists.id AND medias.album = albums.id AND medias.track = tracks.number AND links.id = artists.id AND artists.name LIKE '%$searchstring%' ORDER BY artists.name, albums.name, medias.track;";  

			break;
			
			case 'album':
				// Assign the query
						$query = "SELECT tracks.number AS 'Track #', medias.title AS 'Title', artists.name AS 'Artist', albums.name AS 'Album' , links.desc AS 'Link' FROM tracks, medias, artists, albums, links WHERE medias.artist = artists.id AND medias.album = albums.id AND medias.track = tracks.number AND links.id = artists.id AND albums.name LIKE '%$searchstring%' ORDER BY artists.name, albums.name, medias.track;"; /* Added change for the link as above.  */
			break;
			
			case 'song':
				// Assign the query
						$query = "SELECT tracks.number AS 'Track #', medias.title AS 'Title', artists.name AS 'Artist', albums.name AS 'Album', links.desc AS 'Link' FROM tracks, medias, artists, albums, links WHERE medias.artist = artists.id AND medias.album = albums.id AND medias.track = tracks.number AND links.id = artists.id AND medias.title LIKE '%$searchstring%' ORDER BY artists.name, albums.name, medias.track;";
			break;
		}/* Close switch */		
?>

<!--HTML START-->
<html>
<head>
<title>Media Search</title>
<link rel="stylesheet" href="template/sample.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<?php
// Execute the query
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
		
//Count how many rows are in array. 
	$count = mysqli_num_rows($result);
	
// Check to see if proper searchstring
	if (($searchstring == NULL or $searchstring == "%")){
	echo "<center><b><FONT COLOR=\"red\">Artist name cannot be blank.</font></b><br /></center>";
						}
// If no results were returned
	elseif ($count <= 0){
	echo "<center><b><FONT COLOR=\"red\">Your query returned no results from the database.</font></b><br /></center>";
						}
	else{
//Print Table Header
	echo "<table border='1'>";
		echo "<tr class='queryresults'>";
		echo "<th>Track #</th>";
		echo "<th>Title</th>";
		echo "<th>Artist</th>";
		echo "<th>Album</th>";
		echo "</tr>";
// Fetch and display the results
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$track = $row["Track #"];
		$title = $row["Title"];
		$artist = $row["Artist"];
		$album = $row["Album"];
		$link = $row["Link"]; 
		
		echo "<tr>";
		echo "<td>$track</td>";
		echo "<td>$title</td>";
		echo "<td><a href='artistpage.php$link'>$artist</a></td>";
		echo "<td>$album</td>";
		echo "</tr>";
		}
	}
?>
</body>
</html>