<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

function setlist()
{
	include("inc/connect.php");
	$show_id = $_POST['show_id'];
	try 
	{
		$full_setlist = $db->query(
			"SELECT cm.song_order, so.song_title 
			 FROM concert_matrix cm 
			 JOIN songs so on cm.song_id = so.song_id 
			 WHERE show_id = ".$show_id
		    );	
	} catch (Exception $e) 
	{
		echo "Unable to retrieve results";
		exit;
	}
	$setlist = $full_setlist->fetchALL();
	return $setlist;
}

$wilco_setlist = setlist();

foreach($wilco_setlist as $songs)
{
	$order = $songs[0];
	$song_title = $songs[1];
	echo "<table><tr><td>" .
	$order .
	"</td><td>" .
	$song_title .
	"</td></tr></table>";
}
 
?>