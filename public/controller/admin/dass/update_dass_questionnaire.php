<?php 

	include '../../../../private/initialize.php';

	$dassQuestionnaire = new DassQuestionnaire();

	$data = json_decode(file_get_contents("php://input"),true);


    $dassQuestionnaire->dassQuestionnaireId = $data['dassQuestionnaireId'];
	$dassQuestionnaire->description = $data['description'];
	$dassQuestionnaire->dassChoicesOne = $data['dassChoicesOne'];
	$dassQuestionnaire->dassChoicesOneDescription = $data['dassChoicesOneDescription'];
	$dassQuestionnaire->dassChoicesTwo = $data['dassChoicesTwo'];
	$dassQuestionnaire->dassChoicesTwoDescription = $data['dassChoicesTwoDescription'];
	$dassQuestionnaire->dassChoicesThree = $data['dassChoicesThree'];
	$dassQuestionnaire->dassChoicesThreeDescription = $data['dassChoicesThreeDescription'];
	$dassQuestionnaire->dassChoicesFour = $data['dassChoicesFour'];
	$dassQuestionnaire->dassChoicesFourDescription = $data['dassChoicesFourDescription'];

	$dassQuestionnaire->updateDassQuestionnaire();
 ?>