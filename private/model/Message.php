<?php 

	class Message {
		public $messagesId;
        public $senderId;
		public $receiverId;
        public $text;

		public function __construct() {
			$db = new Database();
			$this->connection = $db->getConnection();
		}

		public function saveTextMessage() {
			$sql ="INSERT INTO `messages`(`MessagesId`, `SenderId`, `ReceiverId`, `Text`)";
			$sql .=" VALUES (0, :senderId, :receiverId, :text)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":senderId" => $this->senderId,
				":receiverId" => $this->receiverId,
				":text" => $this->text,
			]);

		}

		public function retrieveMessageByUser($senderId, $receiverId) {
			$sql="SELECT * FROM `messages` m LEFT JOIN User u ON u.UserId = m.ReceiverId
				WHERE (m.ReceiverId = :senderId AND m.SenderId = :receiverId) OR (m.SenderId = :senderId AND m.ReceiverId = :receiverId) ORDER BY m.MessagesId";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute([
				":senderId" => $senderId,
				":receiverId" => $receiverId,
			]);

			return $stmt->fetchAll();
		}
		
	}
 ?>