<?php 

    include '../../../../private/initialize.php';

	$message = new Message();

	$data = json_decode(file_get_contents("php://input"),true);

	date_default_timezone_set("Asia/Manila");

    $message->senderId = $_SESSION['UserId'];
    $message->receiverId = $data['receiverId'];
    $message->text = $data['text'];

	$message->saveTextMessage();
 ?>