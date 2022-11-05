<?php 

	class Dass {
		
		public $dassId;
        public $dateCreated;
        public $createdByUserId;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function retrieveAllDass() {
			//
		}

		public function retrieveDass() {
			// $sql="SELECT * FROM `dass`";

			$sql="SELECT d.DassId, d.DateCreated, d.CreatedByUserId, 

			CASE
				WHEN
					(SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId) >= 0 AND (SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId) <= 4
				THEN
					CONCAT((SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId), ' - (Minimal Anxiety)')
					
				WHEN
					(SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId) >= 5 AND (SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId) <= 9
				THEN
					CONCAT((SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId), ' - (Mild Anxiety)')
				WHEN
					(SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId) >= 10 AND (SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId) <= 14
				THEN
					CONCAT((SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId), ' - (Moderate Anxiety)')
					
				ELSE
					CONCAT((SELECT SUM(dds.Value) FROM dassdetails dds WHERE dds.DassId = d.DassId), ' - (Severe Anxiety)')
			END as TotalScore,
			
			(SELECT u.IdNumber FROM user u WHERE u.UserId = d.CreatedByUserId) AS IdNumber,
			
			(SELECT CONCAT(u.FirstName, ' ', u.LastName) FROM user u WHERE u.UserId = d.CreatedByUserId) AS FullName
			
			
			FROM `dass` d";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
		}

		public function getLatestDassId() {
			$sql="SELECT * FROM `dass` ORDER BY DassId DESC LIMIT 1";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
		}

		public function retrieveDassByUserId($userId) {
			$sql="SELECT * FROM `dass` WHERE `CreatedByUserId` = :createdByUserId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":createdByUserId" => $userId
            ]);

            return $stmt->fetchAll();
		}

		public function addDass() {
			$sql ="INSERT INTO `dass`(`DassId`, `DateCreated`, `CreatedByUserId`)";
			$sql .=" VALUES (0, :dateCreated, :createdByUserId)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
                ":dateCreated" => $this->dateCreated,
                ":createdByUserId" => $this->createdByUserId,
			]);
		}

		public function retrieveDassByDassId($dassId) {
			$sql = "SELECT d.DassId, dq.Description, dq.DassChoicesOne, dq.DassChoicesOneDescription, ";
			$sql .= "dq.DassChoicesTwo, dq.DassChoicesTwoDescription, dq.DassChoicesThree, dq.DassChoicesThreeDescription, ";
			$sql .= "dq.DassChoicesFour, dq.DassChoicesFourDescription, CONCAT('dassScale', dq.DassQuestionnaireId) AS 'dassName', ";
			$sql .= "dd.Value FROM `dass` d INNER JOIN `dassdetails` dd ON dd.DassId = d.DassId ";
			$sql .= "INNER JOIN `dassquestionnaire` dq ON dq.DassQuestionnaireId = dd.DassQuestionnaireId ";
			$sql .= "WHERE d.DassId = :dassId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":dassId" => $dassId
            ]);

            return $stmt->fetchAll();
		}
	}
 ?>