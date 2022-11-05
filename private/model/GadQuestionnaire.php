<?php 

	class GadQuestionnaire {
		public $gadQuestionnaireId;
		public $description;
		public $choicesOne;
		public $choicesOneDescription;
		public $choicesTwo;
		public $choicesTwoDescription;
		public $choicesThree;
		public $choicesThreeoDescription;
		public $choicesFour;
		public $choicesFourDescription;
		public $isActive;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function retrieveGadQuestionnaireById($gadQuestionnaireId) {
			$sql="SELECT * FROM `gadquestionnaire` WHERE `GadQuestionnaireId` = :gadQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":gadQuestionnaireId" => $gadQuestionnaireId
			]);

			return $stmt->fetchAll();
		}

		public function retrieveGadQuestionnaire() {
			$sql="SELECT * FROM `gadquestionnaire`";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function updateGadQuestionnaireStatus() {
			$sql="UPDATE `gadquestionnaire` SET `IsActive`=:isActive WHERE `GadQuestionnaireId`=:gadQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":gadQuestionnaireId" => $this->gadQuestionnaireId,
				":isActive" => $this->isActive
			]);

			return $stmt->fetchAll();
		}

		public function addGadQuestionnaire() {
			$sql="INSERT INTO `gadquestionnaire`(`GadQuestionnaireId`, `Description`, `GadChoicesOne`, `GadChoicesOneDescription`, `GadChoicesTwo`, `GadChoicesTwoDescription`, `GadChoicesThree`, `GadChoicesThreeDescription`, `GadChoicesFour`, `GadChoicesFourDescription`, `IsActive`)";
			$sql .=" VALUES (0, :description, :choicesOne, :choicesOneDescription, :choicesTwo, :choicesTwoDescription, :choicesThree, :choicesThreeDescription, :choicesFour, :choicesFourDescription, 1)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":description" => $this->description,
				":choicesOne" => $this->choicesOne,
				":choicesOneDescription" => $this->choicesOneDescription,
				":choicesTwo" => $this->choicesTwo,
				":choicesTwoDescription" => $this->choicesTwoDescription,
				":choicesThree" => $this->choicesThree,
				":choicesThreeDescription" => $this->choicesThreeDescription,
				":choicesFour" => $this->choicesFour,
				":choicesFourDescription" => $this->choicesFourDescription
			]);

			return $stmt->fetchAll();
		}

		public function updateGadQuestionnaire() {
			$sql ="UPDATE `gadquestionnaire` SET `Description`= :description, `GadChoicesOne`= :choicesOne, ";
			$sql .="`GadChoicesOneDescription`= :choicesOneDescription, `GadChoicesTwo`= :choicesTwo, ";
			$sql .="`GadChoicesTwoDescription`= :choicesTwoDescription,`GadChoicesThree`= :choicesThree, ";
			$sql .="`GadChoicesThreeDescription`= :choicesThreeDescription, `GadChoicesFour`= :choicesFour, ";
			$sql .="`GadChoicesFourDescription`= :choicesFourDescription WHERE `GadQuestionnaireId` = :gadQuestionnaireId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":gadQuestionnaireId" => $this->gadQuestionnaireId,
				":description" => $this->description,
				":choicesOne" => $this->choicesOne,
				":choicesOneDescription" => $this->choicesOneDescription,
				":choicesTwo" => $this->choicesTwo,
				":choicesTwoDescription" => $this->choicesTwoDescription,
				":choicesThree" => $this->choicesThree,
				":choicesThreeDescription" => $this->choicesThreeDescription,
				":choicesFour" => $this->choicesFour,
				":choicesFourDescription" => $this->choicesFourDescription
			]);

			return $stmt->fetchAll();
		}
	}
 ?>