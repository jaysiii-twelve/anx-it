<?php 

	include '../../../../private/initialize.php';

	$dassQuestionnaire = new DassQuestionnaire();

	echo json_encode($dassQuestionnaire->retrieveDassQuestionnaire());
 ?>