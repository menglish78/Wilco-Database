<?php
function shows() {
    include("connect.php");
	//runs query for complete list of shows, puts results in variable "$results"
	try {
	$results = $db->query(
	  "SELECT show_id,
			  show_date, 
			  show_city, 
			  show_venue
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

