<?php 

	include '../../../../private/initialize.php';

	$gadQuestionnaire = new GadQuestionnaire();

	$data = json_decode(file_get_contents("php://input"),true);

	$gadQuestionnaire->gadQuestionnaireId = $data['gadQuestionnaireId'];
    $gadQuestionnaire->isActive = $data['isActive'];


	$gadQuestionnaire->updateGadQuestionnaireStatus();

 ?>