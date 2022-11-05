<?php 

	class User {
		public $userId;
		public $firtName;
		public $middleName;
		public $lastName;
		public $birthDate;
		public $emailAddress;
		public $mobileNumber;
		public $address;
        public $password;
		public $imageName;
		public $userTypeId;
		public $isActive;
		public $idNumber;
		public $departmentId;
		public $courseId;
		public $yearId;
		public $street;
		public $barangay;
		public $city;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function disapproveUser() {
			$sql="UPDATE `user` SET `IsRejected`= 1 WHERE `UserId`=:userId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":userId" => $this->userId
			]);

			return $stmt->fetchAll();
		}

		public function approveUser() {
			$sql="UPDATE `user` SET `IsApprove`= 1 WHERE `UserId`=:userId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":userId" => $this->userId
			]);

			return $stmt->fetchAll();
		}

		public function retrieveAllUser() {
			$sql="SELECT * FROM `user` u";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function updateUserActiveStatus() {
			$sql="UPDATE `user` SET `IsActive`=:isActive WHERE `UserId`=:userId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":userId" => $this->userId,
				":isActive" => $this->isActive
			]);

			return $stmt->fetchAll();
		}

		public function retrieveUserByUserId($userId) {
			$sql="SELECT * FROM `user` u WHERE u.UserId = :userId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":userId" => $userId
			]);

			return $stmt->fetchAll();
		}

		public function retrieveUser($userId) {
			$sql="SELECT u.UserId, u.FirstName, u.LastName, u.EmailAddress, u.MobileNumber, u.ImageName, (SELECT ut.description FROM usertype ut WHERE ut.userTypeId = u.UserTypeId) AS 'UserTypeDescription', u.IsActive, u.IsApprove, u.IsRejected, u.IdNumber, u.DepartmentId, u.CourseId, u.YearId, u.Street, u.Barangay, u.City FROM `user` u WHERE u.UserId <> :userId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":userId" => $userId
			]);

			return $stmt->fetchAll();
		}

		// login user
		public function loginUser() {
			$sql = "SELECT * FROM `user` WHERE EmailAddress = :emailAddress";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":emailAddress" => $this->emailAddress
			]);

			if($stmt->rowCount() <= 0) {
				return false;
			}
			else {
				$data = $stmt->fetch();

				$user = [];

				$is_correct_password = password_verify($this->password, $data['Password']);

				if($is_correct_password) {
					$_SESSION['UserId'] = $data['UserId'];
					$_SESSION['FirstName'] = $data['FirstName'];
					$_SESSION['LastName'] = $data['LastName'];
					$_SESSION['EmailAddress'] = $data['EmailAddress'];
					$_SESSION['ImageName'] = $data['ImageName'];
					$_SESSION['MobileNumber'] = $data['MobileNumber'];

					if(!$data['IsApprove'] && !$data['IsRejected']) {
						echo json_encode(["message" => "account_pending_approval"]);
					}
					else if (!$data['IsApprove'] && $data['IsRejected']) {
						echo json_encode(["message" => "account_rejected"]);
					}
					else {
						echo json_encode(["message" => "correct_password", "userTypeId" => $data['UserTypeId']]);
					}
				}
				else {
					echo json_encode(["message" => "incorrect_password"]);
				}
			}
		}
		//////////////

		// verify user
		public function verifyUser() {
            $sql = "SELECT * FROM `user` WHERE EmailAddress = :emailAddress";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":emailAddress" => $this->emailAddress
			]);

			if($stmt->rowCount() <= 0) {
				echo json_encode(["message" => "Email not found.", "isFound" => false,  "userId" => 0]);
			}
			else {
				$data = $stmt->fetch();
				echo json_encode(["message" => "Email found.", "isFound" => true, "userId" => $data["UserId"]]);
			}
		}
		//////////////

		// reset password
		public function resetPassword() {
            $sql="UPDATE `user` SET `password`= :password WHERE `userId`= :user_id";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":user_id" => $this->user_id,
				":password" => password_hash($this->password,PASSWORD_DEFAULT)
			]);

			return $stmt->fetchAll();
		}
		//////////////
		
		public function addUserViaRegistration() {
			$sql="INSERT INTO `user`(`UserId`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `EmailAddress`, `MobileNumber`, `Password`, `ImageName`, `UserTypeId`, `IdNumber`, `DepartmentId`, `CourseId`, `YearId`, `Street`, `Barangay`, `City`)";
			$sql .=" VALUES (0, :firstName, :middleName, :lastName, :birthDate, :emailAddress, :mobileNumber, :password, :imageName, :userTypeId, :idNumber, :departmentId, :courseId, :yearId, :street, :barangay, :city)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":firstName" => $this->firstName,
				":middleName" => $this->middleName,
				":lastName" => $this->lastName,
				":birthDate" => $this->birthDate,
				":emailAddress" => $this->emailAddress,
				":mobileNumber" => $this->mobileNumber,
				":password" => password_hash($this->password,PASSWORD_DEFAULT),
				":imageName" => $this->imageName,
				":userTypeId" => $this->userTypeId,
				":idNumber" => $this->idNumber,
				":departmentId" => $this->departmentId,
				":courseId" => $this->courseId,
				":yearId" => $this->yearId,
				":street" => $this->street,
				":barangay" => $this->barangay,
				":city" => $this->city,
			]);

			return $stmt->fetchAll();
		}

		public function addUserViaAdmin() {
			$sql="INSERT INTO `user`(`UserId`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `EmailAddress`, `MobileNumber`, `Password`, `ImageName`, `UserTypeId`, `IsActive`)";
			$sql .=" VALUES (0, :firstName, :middleName, :lastName, :birthDate, :emailAddress, :mobileNumber, :password, :imageName, :userTypeId, :isActive)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":firstName" => $this->firstName,
				":middleName" => $this->middleName,
				":lastName" => $this->lastName,
				":birthDate" => $this->birthDate,
				":emailAddress" => $this->emailAddress,
				":mobileNumber" => $this->mobileNumber,
				":password" => password_hash($this->password,PASSWORD_DEFAULT),
				":imageName" => $this->imageName,
				":userTypeId" => $this->userTypeId,
				":isActive" => true
			]);

			return $stmt->fetchAll();
		}

		public function updateUserViaAdmin() {
			$sql ="UPDATE `user` SET `FirstName`= :firstName, `MiddleName`= :middleName, `LastName`= :lastName,";
			$sql .=" `BirthDate` = :birthDate, `EmailAddress` = :emailAddress, `MobileNumber` = :mobileNumber,";
			$sql .=" `ImageName`= :imageName, `UserTypeId` = :userTypeId, `IdNumber` = :idNumber, `DepartmentId` = :departmentId, `CourseId` = :courseId, ";
			$sql .=" `YearId`= :yearId, `Street` = :street, `Barangay` = :barangay, `City` = :city ";
			$sql .=" WHERE `UserId` = :userId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":userId" => $this->userId,
				":firstName" => $this->firstName,
				":middleName" => $this->middleName,
				":lastName" => $this->lastName,
				":birthDate" => $this->birthDate,
				":emailAddress" => $this->emailAddress,
				":mobileNumber" => $this->mobileNumber,
				":imageName" => $this->imageName,
				":userTypeId" => $this->userTypeId,
				":idNumber" => $this->idNumber,
				":departmentId" => $this->departmentId,
				":courseId" => $this->courseId,
				":yearId" => $this->yearId,
				":street" => $this->street,
				":barangay" => $this->barangay,
				":city" => $this->city
			]);

			return $stmt->fetchAll();
		}

		// verify user access
		public function verifyUserAccess() {
            $sql = "SELECT * FROM `user` WHERE EmailAddress = :emailAddress";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":emailAddress" => $this->emailAddress
			]);

			if($stmt->rowCount() <= 0) {
				echo json_encode(["message" => "Email not found.", "isFound" => false,  "userId" => 0]);
			}
			else {
				$data = $stmt->fetch();

				if(!$data['IsApprove'] && !$data['IsRejected']) {
					echo json_encode(["message" => "Account access is pending for approval.", "isVerify" => false]);
				}
				else if(!$data['IsApprove'] && $data['IsRejected']) {
					echo json_encode(["message" => "Account access is disapproved.", "isVerify" => false]);
				}
				else {
					echo json_encode(["message" => "Account access is approved.", "isVerify" => true]);
				}
			}
		}
		//////////////

		// Get List of Department, Course and Year
		public function retrieveDepartment() {
			$sql="SELECT * FROM `department`";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function retrieveCourse() {
			$sql="SELECT * FROM `course`";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function retrieveYear() {
			$sql="SELECT * FROM `year`";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}

	}
 ?>