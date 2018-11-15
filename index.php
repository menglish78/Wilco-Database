<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		});
	</script>
</head>

<?php
include("inc/functions.php");
$wilco_shows = shows();?>

<body id="home_body">
	<div id="search_bar">
		<form class="search_form">
		  <input type="text" placeholder="Search songs..." name="song_search" id="song_search">
		  <button id="search_button"><i class="fa fa-search"></i></button>
		</form>
	</div> 
	<div id="name_div">
		<h1 id-="header_text">BEING THERE</h1>
		<h3>A PERSONAL WILCO CONCERT DATABASE</h3>
	</div>
	<div id="click_shows">
		<p><a href="shows.php">Click here</a> to see a list of all shows.</p>
	</div>
</body>
</html>
