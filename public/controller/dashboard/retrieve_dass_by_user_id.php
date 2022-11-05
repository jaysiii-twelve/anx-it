<?php 

	include '../../../private/initialize.php';

	$dass = new Dass();

	echo json_encode($dass->retrieveDassByUserId($_SESSION['UserId']));
 ?>