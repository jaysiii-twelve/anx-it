<?php 

	include '../../../../private/initialize.php';

	$user = new User();

	echo json_encode($user->retrieveUser($_SESSION['UserId']));

	// echo json_encode($_SESSION['UserId']);
 ?>