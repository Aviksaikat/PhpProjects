<?php

	function __autoload($class)
	{
		require_once "classes/$class.php";
	}
  	if(isset($_POST["cancel"]))
  	{
    	header("Location: index.php");
    	return;
  	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employees Delete Page</title>
	<?php require_once "bootstrap/bootstrapFordelete.php";?>
</head>
<body>
</body>
</html>
