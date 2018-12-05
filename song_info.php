<?php
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);

	include("inc/functions.php");
	include("inc/header.php");

	$song_information = song_stats();
	$count = song_count();
?>
<div id="title_div">
	 <?php
	  if ($count[0] > 0)
	  {
		echo "<h3>".$count[1]."</h3>";
	?>
	</div>	
<div id="all_shows_div">
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
			echo "<p>This song has been played ".$count[0]." time</p>";
		}
		else 
		{
			echo "<p>This song has been played ".$count[0]." times</p>";
		}
		?>
		<p>Appears on the album: Album Name</p>
		<p>First played: 00/00/00</p>
		<p>Last played: 00/00/00</p>
	</div>
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