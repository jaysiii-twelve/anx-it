<?php 

	include '../../../../private/initialize.php';

	$kesslerQuestionnaire = new KesslerQuestionnaire();

	$data = json_decode(file_get_contents("php://input"),true);

	$kesslerQuestionnaire->kesslerQuestionnaireId = $data['kesslerQuestionnaireId'];
    $kesslerQuestionnaire->isActive = $data['isActive'];


	$kesslerQuestionnaire->updateKesslerQuestionnaireStatus();

 ?>