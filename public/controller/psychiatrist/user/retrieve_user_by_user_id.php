<?php 

	include '../../../../private/initialize.php';

	$user = new User();

	echo json_encode($user->retrieveUserByUserId($_GET['userId']));

 ?>