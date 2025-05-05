<?php	
	class DbConnectClass
	{ 
		private $conn = null;
		 
		function connectDb()
		{
			try {
				// подключаемся к серверу
				$conn = new PDO("mysql:host=127.127.126.26", "root", "", array(PDO::ATTR_PERSISTENT => true));
	#			echo $conn->getAttribute(constant("PDO::ATTR_PERSISTENT"));
				$this->conn = $conn;				
			}
			catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}	
		
		function getConnect() {
			return $this->conn;
		}

		function test() {
			echo $this->conn->getAttribute(constant("PDO::ATTR_PERSISTENT"));
		}

		function create_uuid() {
			$query = 'select uuid();';
			$result = $this->conn->query($query);
			$row = $result->fetch();
        	return $row[0];
		}

		function select($sql)
		{
			// echo "$sql <br> $conn <br>";
			// $sql = "SELECT * FROM Users WHERE id = :userid";
			$stmt = $this->conn->prepare($sql);
			// привязываем значение параметра :userid к $_GET["id"]
			// $stmt->bindValue(":userid", $_GET["id"]);
			// выполняем выражение и получаем пользователя по id
			$stmt->execute();
		
			$result = $stmt;
			return $result;
		}		
	}

	function encryptIt( $val, $salt ) {
		$cryptKey  = '34bc965a-44b8-4b47-8d04-99ea50235fbb';
		$qEncoded = base64_encode($salt."-".$val."-".$cryptKey);
		return( $qEncoded );
	}
	
	function decryptIt( $val, $salt ) {
		$cryptKey  = '34bc965a-44b8-4b47-8d04-99ea50235fbb';
		$qDecoded  = base64_decode($val);
		return( $qDecoded );
	}