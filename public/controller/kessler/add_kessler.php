<?php 

	include '../../../private/initialize.php';

	$kessler = new Kessler();

	$data = json_decode(file_get_contents("php://input"),true);

	date_default_timezone_set("Asia/Manila");

    $kessler->dateCreated = date("Y-m-d");
    $kessler->createdByUserId = $_SESSION['UserId'];

	$kessler->addKessler();
 ?>