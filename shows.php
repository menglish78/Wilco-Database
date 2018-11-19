<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

include("inc/header.php");

function shows() {
    include("inc/connect.php");
	//runs query for complete list of shows, puts results in variable "$results"
	try {
	$results = $db->query(
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
	$shows = $results->fetchALL();
	return $shows;
}

$wilco_shows = shows();

?>

<div id="main_show_div">
	<table class='show_table'>
		<thead>
			<tr>
				<th>Date</th>
				<th>Venue</th>
				<th>City</th>
			</tr>
		</thead>
			  
	  <?php
	  foreach($wilco_shows as $concerts)
	  {
		$show_id = $concerts[0];
		$date = date_create($concerts[1]);
		$date_format = date_format($date, "M j, Y");
		$venue = $concerts[2];
		$city = $concerts[3];
		$state = $concerts[4];
		echo "<tbody>
				<tr><td>" .
				$date_format .
				"</td><td>" .
				"<a href='setlist.php?show_id=".$show_id."' id='show_more_".$show_id."'>".$venue."</a>
				<input type='hidden' id='show_id' value='".$show_id."'>".
				"</td><td>" .
				$city .", ".$state .
				"</td></tr>
			  </tbody>";
	  }
	  ?>
	
	</table>
</div>
<div id="stats_div">
</div>
</body>