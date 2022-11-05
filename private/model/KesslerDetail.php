<?php 

	class KesslerDetail {
		public $kesslerDetailId;
		public $kesslerId;
        public $kesslerQuestionnaireId;
		public $value;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function retrieveKesslerByKesslerId($kesslerId) {
			$sql="SELECT * FROM `kesslerdetails` WHERE `KesslerId` = :kesslerId";

			$stmt = $this->connection->prepare($sql);

            $stmt->execute([
                ":kesslerId" => $kesslerId
            ]);

            return $stmt->fetchAll();
		}

		public function addKesslerDetails() {
			$sql ="INSERT INTO `kesslerdetails`(`kesslerDetailsId`, `KesslerId`, `KesslerQuestionnaireId`, `Value`)";
			$sql .=" VALUES (0, :kesslerId, :kesslerQuestionnaireId, :value)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":kesslerId" => $this->kesslerId,
				":kesslerQuestionnaireId" => $this->kesslerQuestionnaireId,
				":value" => $this->value,
			]);
		}
		
	}
 ?>