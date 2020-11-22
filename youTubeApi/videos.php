<!DOCTYPE html>
<!--this program shwos the data sotred in the local database-->
<html>
<head>
	<title>Videos Page</title>
	<?php require_once "bootstrap.php";?>
</head>
<body>
	<?php

	include "dbConnection.php";
	$db = new dbConnection();
	$pdo = $db->connect();

	echo "<h1>Videos</h1>";
	//for videos
	$stmt = $pdo->prepare("SELECT * FROM videos WHERE vid_type=1");
	$stmt->execute();
	$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	echo "<div class='row'>";
	foreach ($videos as $video) 
	{
		echo "<div class='col-md-5'>";
		echo "<label>".$video["title"]."</label>";
		echo '<iframe width="560" height="315" 
		src="https://www.youtube.com/embed/'.$video["vid_id"].'" 
		frameborder="0" allow="accelerometer; clipboard-write; 
		encrypted-media; gyroscope; picture-in-picture" 
		allowfullscreen></iframe>';
		echo "</div>";
	}
	echo "</div>";

	echo "<h1>Playlists</h1>";
	//for playlists
	$stmt = $pdo->prepare("SELECT * FROM videos WHERE vid_type=2");
	$stmt->execute();
	$playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo "<div class='row'>";
	foreach ($playlists as $video) 
	{
		echo "<div class='col-md-5'>";
		echo "<label>".$video["title"]."</label>";
		echo '<iframe width="560" height="315" 
		src="https://www.youtube.com/embed/?listType=playlists&list='
		.$video["vid_id"].'" 
		allowfullscreen></iframe>';
		echo "</div>";
	}
	echo "</div>";
?>
</body>
</html>
