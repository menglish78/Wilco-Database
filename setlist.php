<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

include("inc/functions.php");
include("inc/header.php");

$wilco_setlist = setlist();
$show = show_info();

?>
<div id="info_div">
	<div id="title_div">
		<?php
		  $date = date_create($show[0]);
		  $date_format = date_format($date, "M j, Y");
		  $venue = $show[1];
		  $city = $show[2];
		  $state = $show[3];
		  $show_notes = $show[4];
		  echo "<h3>".$venue." - ".$city.", ".$state."</h3>".
			   "<h5>".$date_format."</h5>";
		 ?>
	</div>
	<div id="main_show_div">
		<table class="setlist_table">
			<tbody>
		<?php
		foreach($wilco_setlist as $songs)
		{
			$order = $songs[0];
			$song_id = $songs[1];
			$song_title = $songs[2];
			$list = "
			<tr><td>" .
			$order . ". " .
			"</td><td>" .
			"<a href='song_info.php?song_title=".urlencode($song_title)."' id='show_more_".$song_title."' value='".$song_title."' class='song_link'>".$song_title."</a><input type='hidden' id='song_title' value='".$song_title."'>".
			"</td><td>";
			
			echo $list;
		}
		?>
			</tbody>
		</table>
	</div>
	<div id="stats_div">
		<p><?php echo $show_notes ?></p>
	</div>
</div>

<?
include("inc/footer.php");
?>