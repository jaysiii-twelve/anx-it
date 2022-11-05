<?php 

	include '../../../../private/initialize.php';

	$gad = new Gad();

	echo json_encode($gad->retrieveGadByGadId($_GET['gadId']));
 ?>