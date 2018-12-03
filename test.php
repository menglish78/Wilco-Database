<?php
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	
	include("inc/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
	});
</script>
<style>
	@font-face {
		font-family: 'Morganite-Light';
		src: url(./fonts/Morganite/Morganite-Light.ttf);
	}

	body, html {
		height: 100%;
		margin: 0px;
	}

	.ticket_bg {
		/* The image used */
		background-image: url('./img/wilco_tix.png');

		/* Full height */
		height: 105%; 

		/* Create the parallax scrolling effect */
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		
		opacity: 0.85;
	}
	
	.ticket_bg_2 {
		/* The image used */
		background-image: url('./img/band_pic.jpg');

		/* Full height */
		height: 100%; 

		/* Create the parallax scrolling effect */
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		
		opacity: 0.85;
	}
	
	#all_shows_div {
		height:100%;
		background-color:#f3f3f3;
		font-size:36px;
	}
	
	#name_div {
	    position: absolute;
		left: 0;
		top: 35%;
		width: 100%;
		text-align: center;
	}
	
	/* #header_bg {
		background-color: rgba(7, 121, 146, 0.8);
	} */
	
	h1 {
		font-size: 27rem;
		margin: 0px;
		color: #005995;
		font-family: 'Morganite-Light', sans-serif;
	}
	
	#arrow_container {
		position:absolute;
		width: 50px;
		height: 50px;
	    margin-left:-25px;
	    left:50%;
	}
	
	#down_arrow {
		width: 100%;
		height: auto;
	}
	
	* {
		box-sizing: border-box;
	}
	
	#about_div {
		background-color: #2c2c2c;
		padding: 50px 80px;
	}
	
	#about_head {
		font-family: 'Roboto Condensed', sans-serif;
		font-size: 2rem;
		font-weight: 100;
		font-style: normal;
		color: #ce9e62;
		margin: 0px;
		text-align: center;
		padding-bottom: 10px;
	}
	
	#about_hr {
		width: 100%;
		border: 0;
		height: 1px;
		background: #005995;
	}
	
	#about_text {
		text-align: justify;
		font-family: 'Open Sans', sans-serif;
		color: #f3f3f3;
		padding-top: 10px;
	}
	
	#search_div {
		padding: 50px 80px;
		background-color: #2c2c2c;
		font-family: 'Lato', sans-serif;
		text-align: center;
	}
	
	#search_head {
		font-family: 'Roboto Condensed', sans-serif;
		font-size: 1.75rem;
		font-weight: 100;
		font-style: normal;
		color: #F4360B;
		margin: 0px;
		padding-bottom: 20px;
	}
	
	#footer_div {
		height: 45px;
		background-color: #005995;
		text-align: center;
	}
	
	#footer_info {
		padding-top: 5px;
		margin: 0px;
		font-family: 'Roboto Condensed', sans-serif;
		font-size: 1rem;
		font-weight: 100;
		font-style: normal;
		color: #ce9e62;
	}
	
	.search_form {
		width: 70%;
		margin: auto;
	}

	/* Style the search field */
	form.search_form input[type=text] {
	  padding: 10px;
	  font-size: 17px;
	  border: none;
	  float: left;
	  width: 80%;
	  background: #f1f1f1;
	}

	/* Style the submit button */
	form.search_form button {
	  float: left;
	  width: 20%;
	  padding: 10px;
	  background: #005995 ;
	  color: white;
	  font-size: 17px;
	  border: none;
	  border-left: none; /* Prevent double borders */
	  cursor: pointer;
	}

	form.search_form button:hover {
	  background: #008ae6;
	}

	/* Clear floats */
	form.search_form::after {
	  content: "";
	  clear: both;
	  display: table;
	}
	
	@media only screen and (max-device-width: 770px) {
		/* .ticket_bg {
			background-attachment: scroll;
		} */
		h1 {
			font-size: 10rem;
		}
		h3 {
			font-size: 1.5rem;
		}
		#name_div {
			top: 50%;
		}
		#arrow_container {
			bottom: -100px;
		}
	}
		
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
	<table>
		<tr><td>List of all shows will go here.</td></tr>
	</table>
	</div>
	<div id="search_div">	
		<p id="search_head">Search here for statistics on any of 100+ songs we've seen:</p>
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

