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

function song_count() {
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
	$song_count = $count_results->fetchALL();
	return $song_count;
}


