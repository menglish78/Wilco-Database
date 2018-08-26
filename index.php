<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<script>
		$(document).ready(function(){
			$(".show_more_link").click(function(){
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
			<img src="img/wilco_logo.png" alt="logo" />
		</div>
	</div>
	<div id="main_show_div">
		  <?php
		  foreach($wilco_shows as $concerts){
			$show_id = $concerts[0];
			$date = date_create($concerts[1]);
			$date_format = date_format($date, "M j, Y");
			$city = $concerts[2];
			$venue = $concerts[3];
			echo "<table class='show_table'><tr><td>" .
			"<input type='hidden' id='show_id' value='".$show_id."'>" .
			"</td></tr>" .
			"<tr><td>" .
			$date_format.
			"</td><td>" .
			$city .
			"</td><td>" .
			$venue .
			"</td><td>".
			"<a href='ajax_setlist.php?show_id=".$show_id."' id='show_more_".$show_id."' class='show_more_link'><img src='img/down_arrow.png' alt='down_arrow' id='down_arrow'/></a>".
			"</td></tr><tr><td>" .
			"</td></tr>" .
			"</table>" .
			"<div id='hidden_div_".$show_id."' style='display:none'></div>";
		  }
		  ?>
	</div>
</div>

	
</body>