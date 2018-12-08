<?php
function shows() {
    include("connect.php");
	try {
	$shows_results = $db->query(
	  "SELECT show_id,
			  show_date,
			  show_venue,
			  show_city,			  
			  show_state
	   FROM shows
	   ORDER BY show_date ASC"
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	$shows = $shows_results->fetchALL();
	return $shows;
}

function song_rank() {
    include("inc/connect.php");
	try {
	$rank_results = $db->query(
	  "SELECT cm.song_id, COUNT(*) AS magnitude,
			  s.song_title
	   FROM concert_matrix cm
	   JOIN songs s ON cm.song_id = s.song_id
	   GROUP BY cm.song_id 
	   ORDER BY magnitude DESC
	   LIMIT 10"
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	$song_rank = $rank_results->fetchALL();
	return $song_rank;
}

function all_song_count() {
	include("inc/connect.php");
	try {
	$count_results = $db->query(
		"SELECT count(1)
		 FROM songs"
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	$all_song_count = $count_results->fetch();
	return $all_song_count;
}

function song_stats() {
    include("inc/connect.php");
	$song_title = addslashes($_GET['song_title']);
	//$safe_title = htmlspecialchars_decode($song_title);
	try {
	$results = $db->query(
	  "select cm.show_id,
		      sh.show_date,
		      sh.show_city,
		      sh.show_state,
		      sh.show_venue
	   from concert_matrix cm
	   join shows sh on cm.show_id = sh.show_id
	   join songs s on cm.song_id = s.song_id
	   where s.song_title LIKE '%".$song_title."%'"
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	
	$song_info = $results->fetchALL();
	
	return $song_info;
}

function song_count() {
    include("inc/connect.php");
	$song_title = addslashes($_GET['song_title']);
	//$safe_title = htmlspecialchars_decode($song_title);
	try {
	$results = $db->query(
	  "select count(*) as times_played,
	          s.song_title
	   from concert_matrix cm
	   join songs s on cm.song_id = s.song_id
	   where s.song_title LIKE '%".$song_title."%'"
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	
	$times_played = $results->fetch();
	return $times_played;
}


function setlist()
{
	include("inc/connect.php");
	$show_id = $_GET['show_id'];
	try 
	{
		$full_setlist = $db->query(
			"SELECT cm.song_order, 
			        cm.song_id,
					so.song_title
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
				  show_state,
				  show_notes
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


