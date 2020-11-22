<?php
	session_start();
	function __autoload($class)
	{
		require_once "classes/$class.php";
	}
  if(isset($_POST["cancel"]))
  {
    header("Location: index.php");
    return;
  }
	$status = false;
	if ( isset($_SESSION["status"]) )
	{
  	unset($_SESSION["error"]);
	}
  if(isset($_POST["submit"]))
  {
		$name = $_POST["name"];
    $city = $_POST["city"];
    $des = $_POST["designation"];

		if(!empty($name) && !empty($city) && !empty($des))
		{
			$name = filter_var($name,FILTER_SANITIZE_STRING);//build-in fn. don't need htmlentitiesor anything
			$city = filter_var($city,FILTER_SANITIZE_STRING);
			$des = filter_var($des,FILTER_SANITIZE_STRING);
			$info = [ "name" => $name,
	              "city" => $city,
	              "designation" => $des
	            ];
	    $employee = new employee();//so that we can use the insert method in the employee class
	    $employee->insert($info);
		}
		else
		{
			$employee = new employee();
			$employee->handleErrors();
		}
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employees Index Page</title>
	<?php require_once "bootstrap/bootstrapForAdd.php";?>
</head>
<body>
</body>
</html>
