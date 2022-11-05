<?php 

	include '../../../private/initialize.php';

	$dassDetail = new DassDetail();
	$dass = new Dass();

	$data = json_decode(file_get_contents("php://input"),true);

	$dassList = $dass->getLatestDassId();
	$dassId = 0;
	for($index = 0; $index < count($dassList); $index++) {
		$dassId = json_decode($dassList[$index]['DassId']);
	}


	$dassQuestionnaireDetails = $data['dassQuestionnaireDetails'];

	for($index = 0; $index < count($dassQuestionnaireDetails); $index++) {
		$dassDetail->dassId = $dassId;
		$dassDetail->dassQuestionnaireId = $dassQuestionnaireDetails[$index]["dassQuestionnaireId"];
		$dassDetail->value = $dassQuestionnaireDetails[$index]["value"];

		$dassDetail->addDassDetails();
	}
 ?>