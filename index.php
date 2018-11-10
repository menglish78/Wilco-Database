<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
		$(document).ready(function(){			
			$("#search_form").on("submit", function(){
				var song_title = ($("#song_title").val().replace(/I'm/g, "").split("'s").pop());
				console.log(song_title);
			});
		});
	</script>
</head>

<?php
include("inc/functions.php");
$wilco_shows = shows();?>

<body id="home_body">
	<div id="search_bar">
		<form class="search_form" id="search_form" method="post" action="song_info.php">
		  <input type="text" placeholder="Search songs..." name="song_title" id="song_title">
		  <button type="submit" id="search_button"><i class="fa fa-search"></i></button>
		</form>
	</div> 
	<div>
		<h1 id-="header_text">BEING THERE</h1>
		<h3>A Personal Wilco Concert Database</h3>
		<div id="click_shows">
			<p><a href="shows.php">Click here</a> to see a list of all shows.</p>
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
		</div> 
		
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
		
		
		-->