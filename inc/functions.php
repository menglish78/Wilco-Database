<?php
function shows() {
  include("connect.php");
//runs query against database, puts results in variable "$results"
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