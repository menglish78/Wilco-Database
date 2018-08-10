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
