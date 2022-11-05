<?php 

	include '../../../../private/initialize.php';

	$gadQuestionnaire = new GadQuestionnaire();

	$data = json_decode(file_get_contents("php://input"),true);

	$gadQuestionnaire->description = $data['description'];
	$gadQuestionnaire->choicesOne = $data['choicesOne'];
	$gadQuestionnaire->choicesOneDescription = $data['choicesOneDescription'];
	$gadQuestionnaire->choicesTwo = $data['choicesTwo'];
	$gadQuestionnaire->choicesTwoDescription = $data['choicesTwoDescription'];
	$gadQuestionnaire->choicesThree = $data['choicesThree'];
	$gadQuestionnaire->choicesThreeDescription = $data['choicesThreeDescription'];
	$gadQuestionnaire->choicesFour = $data['choicesFour'];
	$gadQuestionnaire->choicesFourDescription = $data['choicesFourDescription'];

	$gadQuestionnaire->addGadQuestionnaire();
 ?>