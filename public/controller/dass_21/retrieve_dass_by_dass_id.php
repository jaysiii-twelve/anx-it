<?php 

	include '../../../private/initialize.php';

	$dass = new Dass();

	echo json_encode($dass->retrieveDassByDassId($_GET['dassId']));
 ?>