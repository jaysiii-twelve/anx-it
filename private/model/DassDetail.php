<?php 

	class DassDetail {
		public $dassDetailId;
		public $dassId;
        public $dassQuestionnaireId;
		public $value;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function retrieveDassByDassId($dassId) {
			$sql="SELECT * FROM `Dassdetails` WHERE `DassId` = :dassId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":dassId" => $dassId
            ]);

            return $stmt->fetchAll();
		}

		public function addDassDetails() {
			$sql ="INSERT INTO `dassdetails`(`DassDetailsId`, `DassId`, `DassQuestionnaireId`, `Value`)";
			$sql .=" VALUES (0, :dassId, :dassQuestionnaireId, :value)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":dassId" => $this->dassId,
				":dassQuestionnaireId" => $this->dassQuestionnaireId,
				":value" => $this->value,
			]);
		}
		
	}
 ?>