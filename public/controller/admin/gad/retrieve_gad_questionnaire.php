<?php 

	include '../../../../private/initialize.php';

	$gadQuestionnaire = new GadQuestionnaire();

	echo json_encode($gadQuestionnaire->retrieveGadQuestionnaire());
 ?>