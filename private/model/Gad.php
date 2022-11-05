<?php 

	class Gad {
		public $gadId;
        public $dateCreated;
		public $createdByUserId;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function getLatestGadId() {
			$sql="SELECT * FROM `gad` ORDER BY GadId DESC LIMIT 1";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
		}

		public function retrieveGad() {
			// $sql="SELECT * FROM `gad`";

			$sql="SELECT g.GadId, g.DateCreated, g.CreatedByUserId, 

			CASE
				WHEN
					(SELECT SUM(gds.Value) FROM gaddetails gds WHERE gds.GadId = g.GadId) >= 0 AND (SELECT SUM(Value) FROM gaddetails gds WHERE gds.GadId = g.GadId) <= 4
				THEN
					CONCAT((SELECT SUM(gds.Value) FROM gaddetails gds WHERE gds.GadId = g.GadId), ' - (Minimal Anxiety)')
					
				WHEN
					(SELECT SUM(Value) FROM gaddetails gds WHERE gds.GadId = g.GadId) >= 5 AND (SELECT SUM(Value) FROM gaddetails gds WHERE gds.GadId = g.GadId) <= 9
				THEN
					CONCAT((SELECT SUM(gds.Value) FROM gaddetails gds WHERE gds.GadId = g.GadId), ' - (Mild Anxiety)')
				WHEN
					(SELECT SUM(Value) FROM gaddetails gds WHERE gds.GadId = g.GadId) >= 10 AND (SELECT SUM(Value) FROM gaddetails gds WHERE gds.GadId = g.GadId) <= 14
				THEN
					CONCAT((SELECT SUM(gds.Value) FROM gaddetails gds WHERE gds.GadId = g.GadId), ' - (Moderate Anxiety)')
					
				ELSE
					CONCAT((SELECT SUM(gds.Value) FROM gaddetails gds WHERE gds.GadId = g.GadId), ' - (Severe Anxiety)')
			END as TotalScore,
			
			(SELECT u.IdNumber FROM user u WHERE u.UserId = g.CreatedByUserId) AS IdNumber,
			
			(SELECT CONCAT(u.FirstName, ' ', u.LastName) FROM user u WHERE u.UserId = g.CreatedByUserId) AS FullName
			
			
			FROM `gad` g";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
		}


		public function retrieveGadByGadId($gadId) {
			$sql = "SELECT g.GadId, gq.Description, gq.GadChoicesOne, gq.GadChoicesOneDescription, ";
			$sql .= "gq.GadChoicesTwo, gq.GadChoicesTwoDescription, gq.GadChoicesThree, gq.GadChoicesThreeDescription, ";
			$sql .= "gq.GadChoicesFour, gq.GadChoicesFourDescription, CONCAT('gadScale', gq.GadQuestionnaireId) AS 'gadName', ";
			$sql .= "gd.Value FROM `gad` g INNER JOIN `gaddetails` gd ON gd.GadId = g.GadId ";
			$sql .= "INNER JOIN `gadquestionnaire` gq ON gq.GadQuestionnaireId = gd.GadQuestionnaireId ";
			$sql .= "WHERE g.GadId = :gadId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":gadId" => $gadId
            ]);

            return $stmt->fetchAll();
		}

		public function retrieveGadByUserId($userId) {
			$sql="SELECT * FROM `gad` WHERE `CreatedByUserId` = :createdByUserId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":createdByUserId" => $userId
            ]);

            return $stmt->fetchAll();
		}

		public function addGad() {
			$sql ="INSERT INTO `gad`(`GadId`, `DateCreated`, `CreatedByUserId`)";
			$sql .=" VALUES (0, :dateCreated, :createdByUserId)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":dateCreated" => $this->dateCreated,
				":createdByUserId" => $this->createdByUserId,
			]);

		}
		
	}
 ?>