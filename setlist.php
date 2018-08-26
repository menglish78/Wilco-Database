<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

function setlist()
{
	include("inc/connect.php");
	$show_id = $_GET['show_id'];
	try 
	{
		$full_setlist = $db->query(
			"SELECT cm.song_order, 
					so.song_title,
					so.song_notes
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
	$song_notes = $songs[2];
	$list = "<table><tr><td>" .
	$order . ". " .
	"</td><td>" .
	$song_title .
	"</td><td>";
	if($song_notes == "")
	{
		$notes = "";
	}
	else
	{
		$notes = "(".$song_notes.")";
	}
	$list .= $notes."</td></tr></table>";
	
	echo $list;
}


 
?>