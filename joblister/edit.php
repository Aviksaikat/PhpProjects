<?php
	session_start();
	function __autoload($class)
	{
		require_once "classes/$class.php";
	}
  if(isset($_GET["id"]))
  {
    $id = $_GET["id"];
    $emp = new employee();
    $res = $emp->selecetOne($id);//storing the query fetched data of the id
  }
  if(isset($_POST["cancel"]))
  {
    header("Location: index.php");
    return;
  }
  if(isset($_POST["submit"]))
  {
    $name = htmlentities($_POST["name"]);
    $city = htmlentities($_POST["city"]);
    $des = htmlentities($_POST["designation"]);
    $id = $_POST["id"];
    $info = [ "name" => $name,
              "city" => $city,
              "designation" => $des
            ];
    $employee = new employee();
    $employee->edit($info,$id);
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employees Edit Page</title>
	<?php require_once "bootstrap/bootstrapForEdit.php";?>
</head>
<body>
</body>
</html>
