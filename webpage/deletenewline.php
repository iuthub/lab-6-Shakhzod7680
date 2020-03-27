<?php

	$pattern="";
	$output="";


if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
	$pattern=$_POST["pattern"];
	
		
		$output= preg_replace("/[\n]/", "", $pattern);
	 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="deletenewline.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<textarea name="pattern" placeholder="Enter text here" value="<?= $pattern ?>"></textarea>
			<dt>Output</dt>
			<dl>
			<?php 
				echo $output;
			?>
			</dl>
			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Delete"></dd>
		</dl>

	</form>
</body>
</html>
