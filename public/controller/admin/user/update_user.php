<?php 

	include '../../../../private/initialize.php';

	$user = new User();

	$data = json_decode(file_get_contents("php://input"),true);


    $user->userId = $data['userId'];
	$user->firstName = $data['firstName'];
    $user->middleName = $data['middleName'];
    $user->lastName = $data['lastName'];
    $user->birthDate = $data['birthDate'];
    $user->emailAddress = $data['emailAddress'];
    $user->mobileNumber = $data['mobileNumber'];
    $user->imageName = $data['imageName'];
    $user->userTypeId = $data['userTypeId'];
    $user->idNumber = $data['idNumber'];
    $user->departmentId = $data['departmentId'];
    $user->courseId = $data['courseId'];
    $user->yearId = $data['yearId'];
    $user->street = $data['street'];
    $user->barangay = $data['barangay'];
    $user->city = $data['city'];

	$user->updateUserViaAdmin();
 ?>