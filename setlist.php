<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

include("inc/header.php");

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
			 WHERE cm.show_id = ".$show_id
		    );	
	} catch (Exception $e) 
	{
		echo "Unable to retrieve results";
		exit;
	}
	$setlist = $full_setlist->fetchALL();
	return $setlist;
}

function show_info() {
    include("inc/connect.php");
	$show_id = $_GET['show_id'];
	try {
		$show_head = $db->query(
		  "select show_date,
		          show_venue,
				  show_city,
				  show_state
		   from shows
		   where show_id = ".$show_id
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	
	$show_info = $show_head->fetch();
	return $show_info;
}

$wilco_setlist = setlist();
$show = show_info();

?>
<div id="main_show_div">
	<?php
	  $date = date_create($show[0]);
	  $date_format = date_format($date, "M j, Y");
	  $venue = $show[1];
	  $city = $show[2];
	  $state = $show[3];
	  echo "<h3>".$venue."</h3>
			<h3>".$city.", ".$state."</h3>
			<h4>".$date_format."</h4>";
	 ?>
	<table class="setlist_table">
		<tbody>
	<?php
	foreach($wilco_setlist as $songs)
	{
		$order = $songs[0];
		$song_id = $songs[1];
		$song_title = $songs[2];
		$song_notes = $songs[3];
		$list = "
		<tr><td>" .
		$order . ". " .
		"</td><td>" .
		"<a href='song_info.php?song_title=".$song_title."' id='show_more_".$song_title."' value='".$song_title."' class='song_link'>".$song_title."</a><input type='hidden' id='song_title' value='".$song_title."'>".
		"</td><td>";
		if($song_notes == "")
		{
			$notes = "";
		}
		else
		{
			$notes = "(".$song_notes.")";
		}
		$list .= $notes."</td></tr>";
		
		echo $list;
	}
	?>
		</tbody>
	</table>
	<table>
		<tr><td><a href="shows.php">Back</a> to list of shows.</td></tr>
	</table>
	</div>
</div>

	
</body>