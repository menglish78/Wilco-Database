<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<script>
		$(document).ready(function(){
			//var_show_id = $("#show_id").val();
			
			$(".show_more_link").click(function(){
				var_show_id = $(this).closest('.show_table').find("#show_id").val();
				//$("#hidden_div_"+var_show_id).toggle();
				//alert(var_show_id);
				
				$.ajax({
					type: "POST",
					url: "ajax_setlist.php",
					data: { 
						show_id: var_show_id
					},
					success: function(result) {
						console.log(result);
					},
					error: function(result) {
						alert(result+'!!!');
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
    <div id="wrapperHeader">
		<div id="header">
			<img src="img/wilco_logo.png" alt="logo" />
		</div>
	</div>
	<div>
	  <div>
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
			"<a href='#' id='show_more_".$show_id."' class='show_more_link'>X</a>".
			"</td></tr><tr><td>" .
			"<div id='hidden_div_".$show_id."' style='display:none'><p>HERE I AM!</p></div>" .
			"</td></tr>" .
			"</table>";
		  }
		  ?>
		</div>
	</div>

	
</body>