<?php  
	class dbConnection
	{
		private $host = "localhost";
		private $dbName = "youtube";
		private $user = "root";
		private $pass = '';

		public function connect()
		{
			try
			{
				//$conn = new PDO("mysql:host=".$this->host.";port=3306; dbname=".$this->dbName.",".$this->user.",".$this->pass);
				$conn = new PDO("mysql:host=localhost;port=3306;dbname=youtube","root","");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			}
			catch(PDOException $e)
			{
				echo "Error in PDO: pow pow ".$e->getMessage();
			}
		}
	}
?>