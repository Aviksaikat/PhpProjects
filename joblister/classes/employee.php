<?php
	//all methods are here
	class employee extends db
	{
		//data selection form db
		public function select()
		{
			$query = $this->connect()->query("SELECT * FROM employee.employees");

			if($query->rowCount() > 0)
			{
				while($row = $query->fetch())
				{
					$data[] = $row;
				}
				return  $data;
			}
		}
		//inserting data
		public function insert($info)
		{
			$implodeColumns = implode(",",array_keys($info));
			$implodePlaceHolder = implode(", :",array_keys($info));//implode concat the things inside "" with each array element
			$stmt = $this->connect()->prepare("INSERT INTO employee.employees ($implodeColumns) VALUES (:".$implodePlaceHolder.")");

			foreach ($info as $key => $value)
			{
				$stmt->bindValue(":".$key,$value);
			}

			$stmtExe = $stmt->execute();

			if($stmtExe)
			{
				header("Location: index.php");
			}
		}

		//selelcting the data of specific id
		public function selecetOne($id)
		{
			$stmt = $this->connect()->prepare("SELECT * FROM employee.employees WHERE id = :id");
			//$stmt->bindValue(":",$id);//don't know thy this not working
			$stmt->execute([":id"=>$id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

		//editing the data
		public function edit($info,$id)//info is no of fields like name,city etc.
		{
			//$stmt = $this->connect()->prepare("UPDATE employee.employees SET name = :name,city = :city, des = :designation");
			//the original query looks like this
			$st = " ";//space is important
			$counter  = 1;
			$total_fields = count($info);
			foreach ($info as $key => $value)
			{
				//if to avoid printing the "," for last element
				if($counter === $total_fields)//compare without conversion
				{
					$set = "$key = :".$key;//like name = :name
					$st = $st.$set;
				}
				else
				{
					$set = "$key = :".$key.", ";
					$st = $st.$set;
					$counter++;
				}
			}
			$sql = "";
			$sql.= "UPDATE employee.employees SET".$st;//get the st string
			$sql.=" WHERE id = ".$id;

			$stmt = $this->connect()->prepare($sql);//connecting the database

			foreach ($info as $key => $value)
			{
				$stmt->bindValue(":".$key, $value);
			}

			$exe = $stmt->execute();//checking connection

			if($exe)
			{
				header("Location: index.php");
			}
		}

		//deleting data

		public function del($id)
		{
			$stmt = $this->connect()->prepare("DELETE FROM employee.employees WHERE id = :id");
			$stmt->bindValue(":id",$id);
			$stmt->execute();
			$_SESSION["color"] = "green";
		}

		public function handleErrors()
		{
			if(empty($name))
			{
				$_SESSION["error[nameError]"] = "The Name is required";
			}
			if(empty($city))
			{
				$_SESSION["error[cityError]"] = "The City is required";
			}
			if(empty($des))
			{
				$_SESSION["error[desError]"] = "The Designation is required";
			}
			header("Location: add.php");
			die();
		}
	}
?>
