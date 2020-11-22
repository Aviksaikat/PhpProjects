<?php
	//just the PDO connection
	class db
	{
		protected function connect()
		{
			//connection
			try
			{
				$con = new PDO("mysql:host = localhost;port=3306;dbname = employee","dhup","dhap");
				$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				return $con;
			}
			catch(PDOException $e)
			{
				echo "Connection failed: ".$e->getMessage();
    		die();
			}
		}
}
