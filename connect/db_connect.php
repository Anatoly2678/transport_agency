<?php
	
	
	class DbConnectClass
	{ 
		private $conn = null;
		 
		function connectDb()
		{
			try {
				// подключаемся к серверу
				$conn = new PDO("mysql:host=127.127.126.26", "root", "", array(PDO::ATTR_PERSISTENT => true));
		#		echo "Database connection established <br>";
	#			echo $conn->getAttribute(constant("PDO::ATTR_PERSISTENT"));
				$this->conn = $conn;				
			}
			catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}	
		
		function test() {
			echo $this->conn->getAttribute(constant("PDO::ATTR_PERSISTENT"));
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
?>