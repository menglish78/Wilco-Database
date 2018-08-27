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
			        cm.song_id,
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
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<script>
		$(document).ready(function(){
			
		});
	</script>
</head>
<body>
<div id="body_div">
	<div id="wrapper_header">
		<div id="header">
			<a href="index.php"><img src="img/wilco_logo.png" alt="logo" /></a>
		</div>
	</div>
	<div id="main_show_div">
	<?php
	foreach($wilco_setlist as $songs)
	{
		$order = $songs[0];
		$song_id = $songs[1];
		$song_title = $songs[2];
		$song_notes = $songs[3];
		$list = "<table><tr><td>" .
		$order . ". " .
		"</td><td>" .
		"<a href='song_info.php?song_title=".$song_title."' id='show_more_".$song_title."'>".$song_title."</a>".
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
	<table>
		<tr><td><a href="shows.php">Back</a> to list of shows.</td></tr>
	</table>
	</div>
</div>

	
</body>