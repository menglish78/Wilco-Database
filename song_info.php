<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

include("inc/header.php");

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

$song_information = song_stats();
$count = song_count();
?>

<div id="main_show_div">
	<div id="title_div">
	 <?php
	  if ($count[0] > 0)
	  {
		echo "<h3>".$count[1]."</h3>";
	?>
	</div>	  
		  <table class='show_table'>
			<thead>
				<tr>
					<th>Date</th>
					<th>Venue</th>
					<th>City</th>
				</tr>
		  </thead>
		  <?php
		  foreach($song_information as $played_at){
			$show_id = $played_at[0];
			$date = date_create($played_at[1]);
			$date_format = date_format($date, "M j, Y");
			$city = $played_at[2];
			$state = $played_at[3];
			$venue = $played_at[4];
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
					
					//"<div id='hidden_div_".$show_id."' style='display:none'></div>";
		  }
		  ?>
		
		</table>
	</div>	
	<div id="stats_div">
		<?
		if ($count[0] == 1)
		{
			echo "<h4>This song has been played ".$count[0]." time.</h4>";
		}
		else 
		{
			echo "<h4>This song has been played ".$count[0]." times.</h4>";
		}
		?>
	</div>
	  <?php
	  }
	  else
	  {
		echo "I'm sorry, but we can't find that song in our database. Please search again.<br/>
			  <a href='javascript:history.back(1);'>Go Back</a>";
	  }
	  ?>

</body>