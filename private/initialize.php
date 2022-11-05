<?php 

	ob_start();
	session_start();

	define("PRIVATE_PATH", dirname(__FILE__));
	define("PROJECT_PATH", dirname(PRIVATE_PATH));
	define("PUBLIC_PATH", PROJECT_PATH . '/public');
	define("SHARED_PATH", PRIVATE_PATH . '/shared');

	$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
	$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
	define("WWW_ROOT", $doc_root);


	require_once('function.php');
	require_once('config.php');
	require_once('model/Database.php');
	require_once('model/User.php');
	require_once('model/Gad.php');
	require_once('model/Dass.php');
	require_once('model/Kessler.php');
	require_once('model/GadQuestionnaire.php');
	require_once('model/GadDetail.php');
	require_once('model/DassQuestionnaire.php');
	require_once('model/DassDetail.php');
	require_once('model/KesslerQuestionnaire.php');
	require_once('model/KesslerDetail.php');
	require_once('model/Message.php');
 ?>