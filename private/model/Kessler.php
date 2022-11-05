<?php 

	class Kessler {
		
		public $kesslerId;
        public $dateCreated;
        public $createdByUserId;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}
		
		public function retrieveKessler() {
			// $sql="SELECT * FROM `kessler`";

			$sql="SELECT k.KesslerId, k.DateCreated, k.CreatedByUserId, 

			CASE
				WHEN
					(SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId) >= 0 AND (SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId) <= 4
				THEN
					CONCAT((SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId), ' - (Minimal Anxiety)')
					
				WHEN
					(SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId) >= 5 AND (SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId) <= 9
				THEN
					CONCAT((SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId), ' - (Mild Anxiety)')
				WHEN
					(SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId) >= 10 AND (SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId) <= 14
				THEN
					CONCAT((SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId), ' - (Moderate Anxiety)')
					
				ELSE
					CONCAT((SELECT SUM(kds.Value) FROM kesslerdetails kds WHERE kds.KesslerId = k.KesslerId), ' - (Severe Anxiety)')
			END as TotalScore,
			
			(SELECT u.IdNumber FROM user u WHERE u.UserId = k.CreatedByUserId) AS IdNumber,
			
			(SELECT CONCAT(u.FirstName, ' ', u.LastName) FROM user u WHERE u.UserId = k.CreatedByUserId) AS FullName
			
			
			FROM `kessler` k";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
		}

		public function getLatestKesslerId() {
			$sql="SELECT * FROM `kessler` ORDER BY KesslerId DESC LIMIT 1";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
		}

		public function retrieveKesslerByKesslerId($kesslerId) {
			$sql = "SELECT k.KesslerId, kq.Description, kq.KesslerChoicesOne, kq.KesslerChoicesOneDescription, ";
			$sql .= "kq.KesslerChoicesTwo, kq.KesslerChoicesTwoDescription, kq.KesslerChoicesThree, kq.KesslerChoicesThreeDescription, ";
			$sql .= "kq.KesslerChoicesFour, kq.KesslerChoicesFourDescription, kq.KesslerChoicesFive, kq.KesslerChoicesFiveDescription, CONCAT('kesslerScale', kq.KesslerQuestionnaireId) AS 'kesslerName', ";
			$sql .= "kd.Value FROM `kessler` k INNER JOIN `kesslerdetails` kd ON kd.KesslerId = k.KesslerId ";
			$sql .= "INNER JOIN `kesslerquestionnaire` kq ON kq.KesslerQuestionnaireId = kd.KesslerQuestionnaireId ";
			$sql .= "WHERE k.KesslerId = :kesslerId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":kesslerId" => $kesslerId
            ]);

            return $stmt->fetchAll();
		}

		public function retrieveKesslerByUserId($userId) {
			$sql="SELECT * FROM `kessler` WHERE `CreatedByUserId` = :createdByUserId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":createdByUserId" => $userId
            ]);

            return $stmt->fetchAll();
		}

		public function addKessler() {
			$sql ="INSERT INTO `kessler`(`KesslerId`, `DateCreated`, `CreatedByUserId`)";
			$sql .=" VALUES (0, :dateCreated, :createdByUserId)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
                ":dateCreated" => $this->dateCreated,
                ":createdByUserId" => $this->createdByUserId,
			]);
		}
	}
 ?>