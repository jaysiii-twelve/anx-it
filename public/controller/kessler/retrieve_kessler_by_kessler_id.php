<?php 

	include '../../../private/initialize.php';

	$kessler = new Kessler();

	echo json_encode($kessler->retrieveKesslerByKesslerId($_GET['kesslerId']));
 ?>