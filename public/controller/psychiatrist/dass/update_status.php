<?php 

	include '../../../../private/initialize.php';

	$dassQuestionnaire = new DassQuestionnaire();

	$data = json_decode(file_get_contents("php://input"),true);

	$dassQuestionnaire->dassQuestionnaireId = $data['dassQuestionnaireId'];
    $dassQuestionnaire->isActive = $data['isActive'];


	$dassQuestionnaire->updateDassQuestionnaireStatus();

 ?>