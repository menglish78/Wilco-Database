<?php
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
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
	
	h3 {
		font-size: 2rem;
		margin: 0px;
	}
	
	h4 {
		font-size: 1.5rem;
		color: #fff;
		margin: 0px 0px 10px
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
		font-family: 'Lato', sans-serif;
		color: #ce9e62;
		text-align: center;
	}
	
	#search_div {
		padding: 20px 0px 40px;
		background-color: #2c2c2c;
		font-family: 'Lato', sans-serif;
		text-align: center;
	}
	
	.example {
		width: 70%;
		margin: auto;
	}

	/* Style the search field */
	form.example input[type=text] {
	  padding: 10px;
	  font-size: 17px;
	  border: none;
	  float: left;
	  width: 80%;
	  background: #f1f1f1;
	}

	/* Style the submit button */
	form.example button {
	  float: left;
	  width: 20%;
	  padding: 10px;
	  background: #F4360B ;
	  color: white;
	  font-size: 17px;
	  border: none;
	  border-left: none; /* Prevent double borders */
	  cursor: pointer;
	}

	form.example button:hover {
	  background: #f77255;
	}

	/* Clear floats */
	form.example::after {
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
		<h3>A Personal Wilco Concert Database</h3>
	</div>
	<div id="all_shows_div">
	<table>
		<tr><td>Stuff</td></tr>
		<tr><td>Stuff</td></tr>
		<tr><td>Stuff</td></tr>
		<tr><td>Stuff</td></tr>
	</table>
	</div>
	<div id="search_div">	
		<h4>Search Songs Here</h4>
		<form class="example" action="action_page.php">
		  <input type="text" placeholder="Search.." name="search">
		  <button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="ticket_bg_2">
	</div>
</body>
</html>

