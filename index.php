<?php
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	
	include("inc/functions.php");
	
	$wilco_shows = shows();
	$top_songs = song_rank();
	$count_all_songs = all_song_count();
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto|Roboto+Condensed" rel="stylesheet">
<script>
	$(document).ready(function(){			
		$("#search_button").click(function(){
			$(".search_form").submit(false);
			//var song_title = ($("#song_search").val().replace(/I'm/g, "").split("'s").pop());
			var song_title = $("#song_search").val();
			$.ajax(
			{
				type: "GET",
				url: "song_info.php",
				data: { song_title: song_title },
				success: function(response)
				{
					window.location = "song_info.php?song_title="+song_title;
				}
			});
		});
		
		/* var searchSong = function() {
			$(".search_form").submit(false);
			//var song_title = ($("#song_search").val().replace(/I'm/g, "").split("'s").pop());
			var song_title = $("#song_search").val();
			$.ajax(
			{
				type: "GET",
				url: "song_info.php",
				data: { song_title: song_title },
				success: function(response)
				{
					window.location = "song_info.php?song_title="+song_title;
				}
			});
		}
		
		$("#search_button").on('click', searchSong); */
	});
</script>
<style>
	
</style>
</head>
<body>
	<div class="ticket_bg">
		<div id="name_div">
			<div id="header_bg">
				<h1 id-="header_text">BEING THERE</h1>
			</div>
			<!-- <h3>A PERSONAL WILCO CONCERT DATABASE</h3>
			<h4>Scroll Down to See Full List of Shows</h4> -->
			<div id="arrow_container">
				<img id="down_arrow" src="./img/down_arrow.png"></img>
			</div>
		</div>
	</div>
	<div id="about_div">
		<p id="about_head">A Personal Wilco Concert Database</p>
		<hr id="about_hr"/>
		<p id="about_text">My name is Matt. My wife Lindsay and I really enjoy seeing Wilco perform live. We've been lucky enough to see them quite a few times. We've gone to shows with friends, family and, of course, a lot of strangers who happen to also love seeing Wilco live. We've seen a couple of different line-ups of the band and we've seen Jeff Tweedy solo and with his "family band" Tweedy. I think it's safe to say, we've never been disappointed. We thought it would be nice to have some sort of chronicle of these experiences. That's what this site is. It's a way for us to preserve and catalog our experiences with our favorite band.</p>
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
			<table id="rank_table">
				<thead>
					<tr>
						<th>Most Played Songs</th>
					</tr>
				</thead>
				<?php
				  foreach($top_songs as $most_played)
				  {
					$song = $most_played[2];
					$count = $most_played[1];
					$song_id = $most_played[0];
					echo "<tbody>
							<tr><td>" .
								"<a href='song_info.php?song_title=".$song."' id='show_more_".$song."' value='".$song."' class='song_link'>".$song."</a> (".$count.")<input type='hidden' id='song' value='".$song."'>".
							"</td></tr>
						  </tbody>";
				  }
				  ?>
			</table>
		</div>
	</div>
	<div id="search_div">	
		<p id="search_head">Search here for statistics on any of the <?php echo $count_all_songs[0]; ?> songs we've seen:</p>
		<form class="search_form">
		  <input type="text" placeholder="Search Songs..." name="song_search" id="song_search">
		  <button id="search_button"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="ticket_bg_2">
	</div>
	<div id="footer_div">
		<p id="footer_info">&copy; <?php echo date("Y"); ?> Matt English</p>
	</div>
</body>
</html>

