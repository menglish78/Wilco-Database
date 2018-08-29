<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

function shows() {
    include("inc/connect.php");
	//runs query for complete list of shows, puts results in variable "$results"
	try {
	$results = $db->query(
	  "SELECT show_id,
			  show_date,
			  show_venue,
			  show_city,			  
			  show_state
	   FROM shows
	   ORDER BY show_date ASC"
	 );
	} catch (Exception $e) {
	echo "Unable to retrieve results";
	exit;
	}
	$shows = $results->fetchALL();
	return $shows;
}

$wilco_shows = shows();

?>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<script>
		$(document).ready(function(){
			//$(".show_more_link").click(function(){
				// var_show_id = $(this).closest('.show_table').find("#show_id").val();
				// $.ajax(
				// {
					// type: "POST",
					// url: "ajax_setlist.php",
					// data: { show_id: var_show_id },
					// success: function(response)
					// {
						//window.location = "ajax_setlist.php";
						// if($("#hidden_div_"+var_show_id).hasClass("loaded"))
						// {
							// $("#hidden_div_"+var_show_id).toggle(500);
						// } else 
						// {
							// $("#hidden_div_"+var_show_id).addClass("loaded").append(response).toggle(500);
						// }
					// },
					// error: function(response) 
					// {
						// alert('Error');
					// }
				// });
			//});
		});
	</script>
</head>
<body>
<div id="body_div">
	<div id="wrapper_header">
		<!-- <div id="header">
			<a href="index.php"><img src="img/wilco_logo.png" alt="logo" /></a>
		</div> -->
	</div>
	<div id="main_show_div">
	    <table class='show_table'>
			<thead>
				<tr>
					<td>Date</td>
					<td>Venue</td>
					<td>City</td>
				</tr>
			</thead>
				  
		  <?php
		  foreach($wilco_shows as $concerts){
			$show_id = $concerts[0];
			$date = date_create($concerts[1]);
			$date_format = date_format($date, "M j, Y");
			$venue = $concerts[2];
			$city = $concerts[3];
			$state = $concerts[4];
			echo "<tbody>
					<tr><td>" .
					"<input type='hidden' id='show_id' value='".$show_id."'>" .
					"</td></tr>" .
					"<tr><td>" .
					"<a href='setlist.php?show_id=".$show_id."' id='show_more_".$show_id."'>".$date_format."</a>".
					"</td><td>" .
					$venue .
					"</td><td>" .
					$city .", ".$state .
					//"</td><td>".
					//"<a href='setlist.php?show_id=".$show_id."' id='show_more_".$show_id."' class='show_more_link'><img src='img/down_arrow.png' alt='down_arrow' id='down_arrow'/></a>".
					"</td></tr><tr><td>" .
					"</td></tr>
				  </tbody>";
					
					//"<div id='hidden_div_".$show_id."' style='display:none'></div>";
		  }
		  ?>
		
	    </table>
	</div>
</div>

	
</body>