<?php
	//connects to database
	try{
	  $db = new PDO(
		  'mysql:host=localhost;dbname=wilco',
		  'root',
		  'root');
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  //if connection to database fails, message displayed and program ends
	} catch (Exception $e) {
	  echo "Unable to connect";
	  echo $e->getMessage();
	  exit;
	}
?>