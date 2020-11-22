<?php
	/*
	require_once "classes/db.php";
	require_once "classes/employee.php";
	*/
	/*shortcut for the previous lines */
	//for this to work the class name and filename should be same
	function __autoload($class)
	{
		require_once "classes/$class.php";
	}
	if(isset($_GET["del"]))
	{
		$id = $_GET["del"];
		$employee = new employee();
		$employee->del($id);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employees Index Page</title>
	<?php require_once "bootstrap/bootstrap.php";?>
</head>
<body>
</body>
</html>
