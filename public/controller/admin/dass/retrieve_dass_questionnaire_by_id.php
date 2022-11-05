<?php 

	include '../../../../private/initialize.php';

	$dassQuestionnaire = new DassQuestionnaire();

	echo json_encode($dassQuestionnaire->retrieveDassQuestionnaireById($_GET['dassQuestionnaireId']));
 ?>