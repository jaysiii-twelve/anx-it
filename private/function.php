<?php 

	function url_for($script_path) {
		if($script_path[0] != '/') {
			$script_path = "/" . $script_path;
		}
		return WWW_ROOT . $script_path;
	}

	// function checkSession() {
	// 	if(isset($_SESSION['user_type_id']) && isset($_SESSION['user_category_id'])) {

	// 		if($_SESSION['user_category_id'] == 1) {
	// 			if($_SESSION['user_type_id'] == 1) {
	// 				header("Location: /sems/public/application/views/registrar/admin/dashboard.php");
	// 			}
	// 			else if($_SESSION['user_type_id'] == 2) {
	// 				header("Location: /sems/public/application/views/registrar/staff/dashboard.php");
	// 			}
	// 		}
	// 	}
	// }

 ?>