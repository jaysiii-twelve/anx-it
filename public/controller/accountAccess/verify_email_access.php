<?php 

	include '../../../private/initialize.php';

	$user = new User();

	$data = json_decode(file_get_contents("php://input"),true);

	$user->emailAddress = $data['emailAddress'];

	$user->verifyUserAccess();
 ?>