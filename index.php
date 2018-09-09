<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<script>
		$(document).ready(function(){			
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
	
		<h1 id-="header_text">BEING THERE</h1>
		<!--<h3>A Personal Wilco Concert Database</h3>-->
<div id="search_container">		
	<div id="search_div">
		<form>
			<div class="search">
				<label for="song_search"><a href="shows.php">Click Here</a> to see a list of all shows  - OR - Search Songs: </label>
				<input name="song_search" class="song_search" id="song_search" type="text" />  
				<button id="search_button">Search</button>
			</div>
		</form> 
	</div>
</div>
</body>
</html>



<!-- <div id="main_show_div">
			<form action="includes/contact.php" method="post">
				<div class="search">
					<label for="song_search"><a>Click Here</a> to see a list of all shows  - OR - Search Songs: </label>
					<input name="song_search" id="song_search" type="text" />
					<button id="search_button">Search</button>
				</div>
			</form> 
		</div> -->