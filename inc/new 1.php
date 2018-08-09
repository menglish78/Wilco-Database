<?php
function family() {
  include("connection.php");
//runs query against database, puts results in variable "$results"
  try {
    $results = $db->query(
      "SELECT test_name
       FROM test_table"
     );
  } catch (Exception $e) {
    echo "Unable to retrieve results";
    exit;
  }
  $family = $results->fetchALL();
  return $family;
}