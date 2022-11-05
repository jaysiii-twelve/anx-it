<?php 

	include '../../../private/initialize.php';

	$dass = new Dass();

	$data = json_decode(file_get_contents("php://input"),true);

	date_default_timezone_set("Asia/Manila");

    $dass->dateCreated = date("Y-m-d");
    $dass->createdByUserId = $_SESSION['UserId'];

	$dass->addDass();
 ?>