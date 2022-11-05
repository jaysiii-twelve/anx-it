<?php 

	$data = json_decode(file_get_contents("php://input"),true);

	$target_dir = "../../../content/images/uploadedImage/";
	$target_file = $target_dir . basename($_FILES['file']['name']);
	$upload_errors = 0;
    $status = [];
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES['file']['tmp_name']);

	if($check != false) {
		$upload_errors = 0;
	}
	else {
		
        $upload_errors = 1;
	}

	// Check if file already exists
	// if (file_exists($target_file)) {
	//     $upload_errors = 2;
	// }

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
	    $upload_errors = 3;
	}


	if($upload_errors > 0) {
		if($upload_errors == 1) {
            $status[] = ["message" => "File is not an image.", "status" => 1];
        }
        // else if($upload_errors == 2){
        //     $status[] = ["message" => "Sorry, file already exists.", "status" => 2];
        // }
        else {
            $status[] = ["message" => "Sorry, only JPG, JPEG, & PNG files are allowed.", "status" => 3];
        }
	}
	else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $status[] = ["message" => "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.", "status" => 5];
	    } else {
            $status[] = ["message" => "Sorry, there was an error uploading your file.", "status" => 4];
	    }
	}

    echo json_encode($status);
 ?>