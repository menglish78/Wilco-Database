<?php
include("inc/functions.php");
$wilco_shows = shows();?>

<div>
  <h2>WILCO SHOWS</h2>
    <div>
      <table>
      <?php
      foreach($wilco_shows as $concerts){
        // change sql date_time to Mon 01, Year format
        $date = $concerts[0];
        echo "<tr><td>" .
        $date .
        "</td><td>" .
        $concerts[1] .
		"</td><td>" .
        $concerts[2] .
        "</td></tr>";
      }
      ?>
    </table>
    </div>
</div>
