<?php 

	include '../../../private/initialize.php';

	$gad = new Gad();

	echo json_encode($gad->retrieveGadByUserId($_SESSION['UserId']));
 ?>