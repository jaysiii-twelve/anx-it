<?php 

	include '../../../private/initialize.php';

	$user = new User();

	$data = json_decode(file_get_contents("php://input"),true);

    $user->user_id = $data['user_id'];
	$user->password = $data['password'];

	$user->resetPassword();
 ?>