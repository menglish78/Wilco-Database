<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<script>
		$(document).ready(function(){
			
		});
	</script>
</head>

<?php
include("inc/functions.php");
$wilco_shows = shows();?>

<body>
    <div id="wrapperHeader">
		<div id="header">
			<img src="img/wilco_logo.png" alt="logo" />
		</div>
	</div>
	<div>
	  <h2>WILCO SHOWS</h2>
		<div>
		  <table>
		  <?php
		  foreach($wilco_shows as $concerts){
			$date = $concerts[0];
			$city = $concerts[1];
			$venue = $concerts[2];
			echo "<tr><td>" .
			$date .
			"</td><td>" .
			$city .
			"</td><td>" .
			$venue .
			"</td></tr>";
		  }
		  ?>
		</table>
		</div>
	</div>

	<?php
	$wilco_setlist = setlist();
	?>

	<div>
	  <h2>Carbondale Setlist</h2>
		<div>
		  <table>
		  <?php
		  foreach($wilco_setlist as $songs){
			$order = $songs[0];
			$song_title = $songs[1];
			echo "<tr><td>" .
			$order .
			"</td><td>" .
			$song_title .
			"</td></tr>";
		  }
		  ?>
		</table>
		</div>
	</div>
</body>