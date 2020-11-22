<?php
	//this program saves the data to local database from youtube 
	
	include "dbConnection.php";
	$db = new dbConnection();
	$pdo = $db->connect();

	$key = "AIzaSyBEWP6_FVZFQf2T05Y47ZdZGk1YNhkr4gI";
	$base_url = "https://www.googleapis.com/youtube/v3/";
	$channel_id = "UCGdUmpP0OSaUu5VRUOxq4CA";
	$max_result = 10;
	$video_type = !isset($_GET["vtype"]) ? 1 : 2;
	
	
	switch ($video_type) 
	{
		case 1: getVideos();
				break;
		case 2: getPlayLists();
				break;
	}

	function getPlayLists()
	{
		global $pdo,$base_url,$channel_id,$max_result,$key;
		$API_URL = $base_url."playlists?order=date&part=snippet&channelId=".$channel_id."&maxResults=".$max_result."&key=".$key;
		#echo $API_URL;
		$playLists = json_decode(file_get_contents($API_URL));
		foreach($playLists->items as $vi) 
		{
			//all this form reading the API
			$sql = "INSERT INTO `videos` (`id`, `vid_type`, `vid_id`, `title`, `thumb_url`, `published_at`) VALUES (NULL, 2, :vid, :tit, :turl, :pdate)";
			// 1 for vid 2 for playlists
			$stmt = $pdo->prepare($sql);
			//$stmt->bindParam(":vtype",1);
			$stmt->bindParam(":vid",$vi->id);
			$stmt->bindParam(":tit",$vi->snippet->title);
			$stmt->bindParam(":turl",$vi->snippet->thumbnails->high->url);
			$stmt->bindParam(":pdate",$vi->snippet->published_at);

			$stmt->execute();
		}
	}
	

	function getVideos()
	{
		
		global $pdo,$base_url,$channel_id,$max_result,$key;
		$API_URL = $base_url."search?order=date&part=snippet&channelId=".$channel_id."&maxResults=".$max_result."&key=".$key;
		#echo $API_URL;
		$vid = json_decode(file_get_contents($API_URL));
	
		#print_r($vid);
		foreach($vid->items as $vi) 
		{
			//all this form reading the API
			$sql = "INSERT INTO `videos` (`id`, `vid_type`, `vid_id`, `title`, `thumb_url`, `published_at`) VALUES (NULL, 1, :vid, :tit, :turl, :pdate)";
			
			$stmt = $pdo->prepare($sql);
			//$stmt->bindParam(":vtype",1);
			$stmt->bindParam(":vid",$vi->id->videoId);
			$stmt->bindParam(":tit",$vi->snippet->title);
			$stmt->bindParam(":turl",$vi->snippet->thumbnails->high->url);
			$stmt->bindParam(":pdate",$vi->snippet->published_at);

			$stmt->execute();
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Index page</title>
</head>
<body>

</body>
</html>