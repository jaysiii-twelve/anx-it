<?php 

	include '../../../../private/initialize.php';

	session_destroy();

	header("Location: http://localhost:8080/AAA/public/views/login.php");
 ?>