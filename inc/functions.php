<?php
function shows() {
    include("connect.php");
	//runs query for complete list of shows, puts results in variable "$results"
	try {
	$results = $db->query(
	  "SELECT show_date, show_city, show_venue
	   FROM shows
	   ORDER BY show_date ASC"
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	$shows = $results->fetchALL();
	return $shows;
}

function setlist() {
	include("connect.php");
	//query for setlist, put results in "$full_setlist" variable
	try {
	$full_setlist = $db->query(
		"SELECT cm.song_order, so.song_title 
		 FROM concert_matrix cm 
		 JOIN songs so on cm.song_id = so.song_id 
		 WHERE show_id = 1"
	 );	
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	$setlist = $full_setlist->fetchALL();
	return $setlist;
}