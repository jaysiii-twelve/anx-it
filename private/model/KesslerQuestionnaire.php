<?php 

	class KesslerQuestionnaire {
		public $kesslerQuestionnaireId;
		public $description;
		public $kesslerChoicesOne;
		public $kesslerChoicesOneDescription;
		public $kesslerChoicesTwo;
		public $kesslerChoicesTwoDescription;
		public $kesslerChoicesThree;
		public $kesslerChoicesThreeoDescription;
		public $kesslerChoicesFour;
		public $kesslerChoicesFourDescription;
		public $kesslerChoicesFive;
		public $kesslerChoicesFiveDescription;
		public $isActive;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function retrieveKesslerQuestionnaireById($kesslerQuestionnaireId) {
			$sql="SELECT * FROM `kesslerquestionnaire` WHERE `KesslerQuestionnaireId` = :kesslerQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":kesslerQuestionnaireId" => $kesslerQuestionnaireId
			]);

			return $stmt->fetchAll();
		}

		public function retrieveKesslerQuestionnaire() {
			$sql="SELECT * FROM `kesslerquestionnaire`";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function updateKesslerQuestionnaireStatus() {
			$sql="UPDATE `kesslerquestionnaire` SET `IsActive`=:isActive WHERE `KesslerQuestionnaireId`=:kesslerQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":kesslerQuestionnaireId" => $this->kesslerQuestionnaireId,
				":isActive" => $this->isActive
			]);

			return $stmt->fetchAll();
		}

		public function addKesslerQuestionnaire() {
			$sql="INSERT INTO `kesslerquestionnaire`(`KesslerQuestionnaireId`, `Description`, `KesslerChoicesOne`, `KesslerChoicesOneDescription`, `KesslerChoicesTwo`, `KesslerChoicesTwoDescription`, `KesslerChoicesThree`, `KesslerChoicesThreeDescription`, `KesslerChoicesFour`, `KesslerChoicesFourDescription`, `KesslerChoicesFive`, `KesslerChoicesFiveDescription`, `IsActive`)";
			$sql .=" VALUES (0, :description, :kesslerChoicesOne, :kesslerChoicesOneDescription, :kesslerChoicesTwo, :kesslerChoicesTwoDescription, :kesslerChoicesThree, :kesslerChoicesThreeDescription, :kesslerChoicesFour, :kesslerChoicesFourDescription, :kesslerChoicesFive, :kesslerChoicesFourDescription, 1)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":description" => $this->description,
				":kesslerChoicesOne" => $this->kesslerChoicesOne,
				":kesslerChoicesOneDescription" => $this->kesslerChoicesOneDescription,
				":kesslerChoicesTwo" => $this->kesslerChoicesTwo,
				":kesslerChoicesTwoDescription" => $this->kesslerChoicesTwoDescription,
				":kesslerChoicesThree" => $this->kesslerChoicesThree,
				":kesslerChoicesThreeDescription" => $this->kesslerChoicesThreeDescription,
				":kesslerChoicesFour" => $this->kesslerChoicesFour,
				":kesslerChoicesFourDescription" => $this->kesslerChoicesFourDescription,
				":kesslerChoicesFive" => $this->kesslerChoicesFive,
				":kesslerChoicesFiveDescription" => $this->kesslerChoicesFiveDescription
			]);

			return $stmt->fetchAll();
		}

		public function updateKesslerQuestionnaire() {
			$sql ="UPDATE `kesslerquestionnaire` SET `Description`= :description, `KesslerChoicesOne`= :kesslerChoicesOne, ";
			$sql .="`KesslerChoicesOneDescription`= :kesslerChoicesOneDescription, `KesslerChoicesTwo`= :kesslerChoicesTwo, ";
			$sql .="`KesslerChoicesTwoDescription`= :kesslerChoicesTwoDescription,`KesslerChoicesThree`= :kesslerChoicesThree, ";
			$sql .="`KesslerChoicesThreeDescription`= :kesslerChoicesThreeDescription, `KesslerChoicesFour`= :kesslerChoicesFour, ";
			$sql .="`KesslerChoicesFourDescription`= :kesslerChoicesFourDescription, ";
			$sql .="`KesslerChoicesFive`= :kesslerChoicesFive, `KesslerChoicesFiveDescription`= :kesslerChoicesFiveDescription WHERE `KesslerQuestionnaireId` = :kesslerQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":kesslerQuestionnaireId" => $this->kesslerQuestionnaireId,
				":description" => $this->description,
				":kesslerChoicesOne" => $this->kesslerChoicesOne,
				":kesslerChoicesOneDescription" => $this->kesslerChoicesOneDescription,
				":kesslerChoicesTwo" => $this->kesslerChoicesTwo,
				":kesslerChoicesTwoDescription" => $this->kesslerChoicesTwoDescription,
				":kesslerChoicesThree" => $this->kesslerChoicesThree,
				":kesslerChoicesThreeDescription" => $this->kesslerChoicesThreeDescription,
				":kesslerChoicesFour" => $this->kesslerChoicesFour,
				":kesslerChoicesFourDescription" => $this->kesslerChoicesFourDescription,
				":kesslerChoicesFive" => $this->kesslerChoicesFive,
				":kesslerChoicesFiveDescription" => $this->kesslerChoicesFiveDescription
			]);

			return $stmt->fetchAll();
		}
	}
 ?>