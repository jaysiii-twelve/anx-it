<?php 

	include '../../../../private/initialize.php';

	$kesslerQuestionnaire = new KesslerQuestionnaire();

	$data = json_decode(file_get_contents("php://input"),true);

	$kesslerQuestionnaire->description = $data['description'];
	$kesslerQuestionnaire->kesslerChoicesOne = $data['kesslerChoicesOne'];
	$kesslerQuestionnaire->kesslerChoicesOneDescription = $data['kesslerChoicesOneDescription'];
	$kesslerQuestionnaire->kesslerChoicesTwo = $data['kesslerChoicesTwo'];
	$kesslerQuestionnaire->kesslerChoicesTwoDescription = $data['kesslerChoicesTwoDescription'];
	$kesslerQuestionnaire->kesslerChoicesThree = $data['kesslerChoicesThree'];
	$kesslerQuestionnaire->kesslerChoicesThreeDescription = $data['kesslerChoicesThreeDescription'];
	$kesslerQuestionnaire->kesslerChoicesFour = $data['kesslerChoicesFour'];
	$kesslerQuestionnaire->kesslerChoicesFourDescription = $data['kesslerChoicesFourDescription'];
	$kesslerQuestionnaire->kesslerChoicesFive = $data['kesslerChoicesFive'];
	$kesslerQuestionnaire->kesslerChoicesFiveDescription = $data['kesslerChoicesFiveDescription'];

	$kesslerQuestionnaire->addKesslerQuestionnaire();
 ?>