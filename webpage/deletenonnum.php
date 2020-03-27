<?php

	$pattern="";
	


if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
	$pattern=$_POST["pattern"];
	
	
		echo preg_replace("/[^0-9,.]/", "", $pattern);
	 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="delete.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>
			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Delete"></dd>
		</dl>

	</form>
</body>
</html>
