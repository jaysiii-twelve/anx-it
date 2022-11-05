<?php 

	include '../../../private/initialize.php';

	$kesslerDetail = new KesslerDetail();
	$kessler = new Kessler();

	$data = json_decode(file_get_contents("php://input"),true);

	$kesslerList = $kessler->getLatestKesslerId();
	$kesslerId = 0;
	for($index = 0; $index < count($kesslerList); $index++) {
		$kesslerId = json_decode($kesslerList[$index]['KesslerId']);
	}


	$kesslerQuestionnaireDetails = $data['kesslerQuestionnaireDetails'];

	for($index = 0; $index < count($kesslerQuestionnaireDetails); $index++) {
		$kesslerDetail->kesslerId = $kesslerId;
		$kesslerDetail->kesslerQuestionnaireId = $kesslerQuestionnaireDetails[$index]["kesslerQuestionnaireId"];
		$kesslerDetail->value = $kesslerQuestionnaireDetails[$index]["value"];

		$kesslerDetail->addKesslerDetails();
	}
 ?>