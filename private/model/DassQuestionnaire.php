<?php 

	class DassQuestionnaire {
		public $dassQuestionnaireId;
		public $description;
		public $dassChoicesOne;
		public $dassChoicesOneDescription;
		public $dassChoicesTwo;
		public $dassChoicesTwoDescription;
		public $dassChoicesThree;
		public $dassChoicesThreeoDescription;
		public $dassChoicesFour;
		public $dassChoicesFourDescription;
		public $isActive;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function retrieveDassQuestionnaireById($dassQuestionnaireId) {
			$sql="SELECT * FROM `dassquestionnaire` WHERE `DassQuestionnaireId` = :dassQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":dassQuestionnaireId" => $dassQuestionnaireId
			]);

			return $stmt->fetchAll();
		}

		public function retrieveDassQuestionnaire() {
			$sql="SELECT * FROM `DassQuestionnaire`";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function updateDassQuestionnaireStatus() {
			$sql="UPDATE `dassquestionnaire` SET `IsActive`=:isActive WHERE `DassQuestionnaireId`=:dassQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":dassQuestionnaireId" => $this->dassQuestionnaireId,
				":isActive" => $this->isActive
			]);

			return $stmt->fetchAll();
		}

		public function addDassQuestionnaire() {
			$sql="INSERT INTO `dassquestionnaire`(`DassQuestionnaireId`, `Description`, `DassChoicesOne`, `DassChoicesOneDescription`, `DassChoicesTwo`, `DassChoicesTwoDescription`, `DassChoicesThree`, `DassChoicesThreeDescription`, `DassChoicesFour`, `DassChoicesFourDescription`, `IsActive`)";
			$sql .=" VALUES (0, :description, :dassChoicesOne, :dassChoicesOneDescription, :dassChoicesTwo, :dassChoicesTwoDescription, :dassChoicesThree, :dassChoicesThreeDescription, :dassChoicesFour, :dassChoicesFourDescription, 1)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":description" => $this->description,
				":dassChoicesOne" => $this->dassChoicesOne,
				":dassChoicesOneDescription" => $this->dassChoicesOneDescription,
				":dassChoicesTwo" => $this->dassChoicesTwo,
				":dassChoicesTwoDescription" => $this->dassChoicesTwoDescription,
				":dassChoicesThree" => $this->dassChoicesThree,
				":dassChoicesThreeDescription" => $this->dassChoicesThreeDescription,
				":dassChoicesFour" => $this->dassChoicesFour,
				":dassChoicesFourDescription" => $this->dassChoicesFourDescription
			]);

			return $stmt->fetchAll();
		}

		public function updateDassQuestionnaire() {
			$sql ="UPDATE `dassquestionnaire` SET `Description`= :description, `DassChoicesOne`= :dassChoicesOne, ";
			$sql .="`DassChoicesOneDescription`= :dassChoicesOneDescription, `DassChoicesTwo`= :dassChoicesTwo, ";
			$sql .="`DassChoicesTwoDescription`= :dassChoicesTwoDescription,`DassChoicesThree`= :dassChoicesThree, ";
			$sql .="`DassChoicesThreeDescription`= :dassChoicesThreeDescription, `DassChoicesFour`= :dassChoicesFour, ";
			$sql .="`DassChoicesFourDescription`= :dassChoicesFourDescription WHERE `DassQuestionnaireId` = :dassQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":dassQuestionnaireId" => $this->dassQuestionnaireId,
				":description" => $this->description,
				":dassChoicesOne" => $this->dassChoicesOne,
				":dassChoicesOneDescription" => $this->dassChoicesOneDescription,
				":dassChoicesTwo" => $this->dassChoicesTwo,
				":dassChoicesTwoDescription" => $this->dassChoicesTwoDescription,
				":dassChoicesThree" => $this->dassChoicesThree,
				":dassChoicesThreeDescription" => $this->dassChoicesThreeDescription,
				":dassChoicesFour" => $this->dassChoicesFour,
				":dassChoicesFourDescription" => $this->dassChoicesFourDescription
			]);

			return $stmt->fetchAll();
		}
	}
 ?>