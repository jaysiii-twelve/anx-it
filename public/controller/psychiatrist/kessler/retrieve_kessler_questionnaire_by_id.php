<?php 

	include '../../../../private/initialize.php';

	$kesslerQuestionnaire = new KesslerQuestionnaire();

	echo json_encode($kesslerQuestionnaire->retrieveKesslerQuestionnaireById($_GET['kesslerQuestionnaireId']));
 ?>