<?php 

	include '../../../private/initialize.php';

	$gad = new Gad();

	$data = json_decode(file_get_contents("php://input"),true);

	date_default_timezone_set("Asia/Manila");

    $gad->dateCreated = date("Y-m-d");
    $gad->createdByUserId = $_SESSION['UserId'];

	$gad->addGad();
 ?>