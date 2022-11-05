<?php 

	include '../../../private/initialize.php';

	$gadDetail = new GadDetail();
	$gad = new Gad();

	$data = json_decode(file_get_contents("php://input"),true);

	$gadList = $gad->getLatestGadId();
	$gadId = 0;
	for($index = 0; $index < count($gadList); $index++) {
		$gadId = json_decode($gadList[$index]['GadId']);
	}


	$gadQuestionnaireDetails = $data['gadQuestionnaireDetails'];

	for($index = 0; $index < count($gadQuestionnaireDetails); $index++) {
		$gadDetail->gadId = $gadId;
		$gadDetail->gadQuestionnaireId = $gadQuestionnaireDetails[$index]["gadQuestionnaireId"];
		$gadDetail->value = $gadQuestionnaireDetails[$index]["value"];

		$gadDetail->addGadDetails();
	}
 ?>