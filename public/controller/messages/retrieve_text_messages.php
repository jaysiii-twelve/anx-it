<?php 

	include '../../../private/initialize.php';

	$message = new Message();

	echo json_encode($message->retrieveMessageByUser($_SESSION['UserId'], $_GET['receiverId']));
 ?>