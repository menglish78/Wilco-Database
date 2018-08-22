<?php

$show_id = $_POST['show_id'];

echo $show_id;

//instead of function, maybe just run query then foreach and return/echo???






// function setlist() {
	// include("connect.php");
	//query for setlist, put results in "$full_setlist" variable
	// try {
	// $full_setlist = $db->query(
		// "SELECT cm.song_order, so.song_title 
		 // FROM concert_matrix cm 
		 // JOIN songs so on cm.song_id = so.song_id 
		 // WHERE show_id = 1
		 // and cm.song_order = 1"
	 // );	
	// } catch (Exception $e) {
	// echo "Unable to retrieve results";
	// exit;
	// }
	// $setlist = $full_setlist->fetchALL();
	// return $setlist;
// }

// $wilco_setlist = setlist();

// foreach($wilco_setlist as $songs){
	// echo $songs[1];
// }
 
	// return $wilco_setlist;
	// $html = "<div>
	  // <h2>Setlist</h2>
		// <div>
		  // <table>".
		  // foreach($wilco_setlist as $songs){
			// $order = $songs[0];
			// $song_title = $songs[1];
			// echo "<tr><td>" .
			// $order .
			// "</td><td>" .
			// $song_title .
			// "</td></tr>";
		  // }.
		// "</table>
		// </div>
	// </div>";

// echo $html;


?>