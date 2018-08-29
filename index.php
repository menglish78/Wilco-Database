<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
	<script src="js/jquery.easy-autocomplete.min.js"></script> 
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/easy-autocomplete.css"> 
	<script>
		$(document).ready(function(){
			var options = {
			url: "inc/autocomplete_songs.json",
			getValue: "name",
			list: {
					match: {
						enabled: true
					}
				  }
			};

			$("#song_search").easyAutocomplete(options);
			
			$("#search_button").click(function(){
				var song_title = ($("#song_search").val().replace(/I'm/g, "").split("'s").pop());
				//replace(/\'s.*/,''));
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
		});
	</script>
</head>

<?php
include("inc/functions.php");
$wilco_shows = shows();?>

<body id="home_body">
	<div id="text_div">
		<h1 id-="header_text">BEING THERE</h1>
		<h3>A Personal Wilco Concert Database</h3>
		<div id="main_show_div">
			<span>Click Here for a full list of shows - OR - Search Songs</span>
		</div>
	</div>
</body>
</html>