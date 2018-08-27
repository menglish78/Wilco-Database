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

<body>
<div id="body_div">
	<div id="wrapper_header">
		<div id="header">
			<a href="index.php"><img src="img/wilco_logo.png" alt="logo" /></a>
		</div>
	</div>
	<div id="main_show_div">
		<table>
			<tr><td><a href="shows.php">Click here</a> to see the full list of shows.</td></tr>
		</table>
		<table>
			<tr><td>Or</td></tr>
		</table>
		<table>
			<tr><td>Search Songs: </td><td><input type="text" id="song_search"></input></td><td><button id="search_button">Search</button></td></tr>
		</table>
	</div>
</div>

	
</body>