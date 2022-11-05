<?php 

	class GadDetail {
		public $gadDetailId;
		public $gadId;
        public $gadQuestionnaireId;
		public $value;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function retrieveGadByGadId($gadId) {
			$sql="SELECT * FROM `gaddetails` WHERE `GadId` = :gadId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":gadId" => $gadId
            ]);

            return $stmt->fetchAll();
		}

		public function addGadDetails() {
			$sql ="INSERT INTO `gaddetails`(`GadDetailsId`, `GadId`, `GadQuestionnaireId`, `Value`)";
			$sql .=" VALUES (0, :gadId, :gadQuestionnaireId, :value)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":gadId" => $this->gadId,
				":gadQuestionnaireId" => $this->gadQuestionnaireId,
				":value" => $this->value,
			]);
		}
		
	}
 ?>