<?php  
$name= "";
$email="";
$username="";
$password="";
$confirmpwd="";
$date_of_birth="";
$adress="";
$city="";
$postal="";
$homephone="";
$mobilephone="";
$credit="";
$credit_date="";
$salary="";
$website="";
$gpa="";

$namepattern="/^([a-zA-Z]{2,} ?)+$/i";
$emailpattern="/^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,} ?)+$/i";
$usernamepat="/^([a-zA-Z0-9@.]{5,}?)+$/i";
$pwdpattern="/(\w{6,10})([a-z@._%+-]{1,})([A-Z]{3,})([0-9]{1,})+$/i"	;
$confirmpwdpattern="/^([a-zA-Z0-9@._%+-]{8,}?)+$/i";
$date_of_birth_pattern="/^(0[1-9]|[12][0-9]|3[01])[-.](0[1-9]|1[012])[-.]([0-9]{4})+$/i";
$adresspattern="/^[a-zA-Z0-9 ]+$/i";
$citypattern="/^[a-zA-Z]{2,}+$/i";
$postalpattern="/^\d{6}+$/i";
$phonepattern="/^([0-9 ]{2})([ ]{1})([0-9]{7})+$/i";
$creditpattern="/^([0-9]{4})([ ]{1})([0-9]{4})([ ]{1})([0-9]{4})([ ]{1})([0-9]{4})+$/i";
$credit_datepattern="/^(0[1-9]|[12][0-9]|3[01])[-.](0[1-9]|1[012])[-.]([0-9]{4})+$/i";
$salarypattern="/^([0-9,.])+$/i";
$websitepattern="/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
$gpapattern="/^([0-9]{1})[.]([0-9]{1,})+$/i";

$isPost=$_SERVER["REQUEST_METHOD"]=="POST";
$isValid=TRUE;

if($isPost)
{
	$name=$_REQUEST["name"];
	$email=$_REQUEST["email"];
	$username=$_REQUEST["username"];
	$password=$_REQUEST["password"];
	$confirmpwd=$_REQUEST["confirmpwd"];
	$date_of_birth=$_REQUEST["date_of_birth"];
	$adress=$_REQUEST["adress"];
	$city=$_REQUEST["city"];
	$postal=$_REQUEST["postal"];
	$homephone=$_REQUEST["homephone"];
	$mobilephone=$_REQUEST["mobilephone"];
	$credit=$_REQUEST["credit"];
	$credit_date=$_REQUEST["credit_date"];
	$salary=$_REQUEST["salary"];
	$website=$_REQUEST["website"];
	$gpa=$_REQUEST["gpa"];
	
	setcookie("name", $name, time()+3600);
	setcookie("email",$email, time()+3600);
	setcookie("username",$username, time()+3600);
	setcookie("password", $password, time()-1);
	setcookie("confirmpwd",$confirmpwd, time()-1);
	setcookie("date_of_birth", $date_of_birth, time()+3600);
	setcookie("city",$city, time()+3600);
	setcookie("postal", $postal, time()+3600);
	setcookie("homephone", $homephone, time()+3600);
	setcookie("mobilephone",$mobilephone, time()+3600);
	setcookie("credit", $credit, time()+360);
	setcookie("credit_date", $credit_date, time()+360);
	setcookie("salary", $salary, time()+360);
	setcookie("website", $website, time()+360);
	setcookie("gpa", $gpa, time()+360);
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
		<style>  
	.error {   color: red;   font-weight: bold;   font-size: small;  } 
</style>
	</head>
	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<form actio="index.php" method="post">
		<dl>
			<dt>Name</dt>
			<dd>
				<input type="text" name="name" value="<?=$name?>"/>
				<?php if($isPost && !preg_match($namepattern,$name)){
					$isValid=FALSE
				?>
				<span class="error">Please provide correct name</span> 
				 <?php } ?>
			</dd>

			<dt>Email</dt>
			<dd>
				<input type="text" name="email" value="<?=$email?>"/>
				<?php if($isPost && !preg_match($emailpattern,$email)){
					$isValid=FALSE
				?>
				<span class="error">Please provide correct email</span> 
				 <?php } ?>
			</dd>

			<dt>Username:</dt>
			<dd>
				<input type="text" name="username" value="<?=$username?>"/>
				<?php 
				if($isPost && !preg_match($usernamepat, $username)){
						$isValid=FALSE
					?>
					<span class="error">Please, provide correct username</span>
				<?php } ?>
			</dd>

			<dt>Password:</dt>
			<dd>
				<input type="password" name="password" value="<?=$password?>"/>
				<?php 
				if($isPost && !preg_match($pwdpattern, $password)){
						$isValid=FALSE
					?>
					<span class="error">Please, provide correct password format</span>
				<?php } ?>
			</dd>

			<dt>Confirm Password:</dt>
			<dd>
				<input type="password" name="confirmpwd" value="<?=$confirmpwd?>"/>
				<?php 
				if($isPost && ($confirmpwd!=$password)){
						$isValid=FALSE
					?>
					<span class="error">Please, confirm correct password format</span>
				<?php } ?>
			</dd>

			<dt>Date of birth:</dt>
			<dd>
				<input type="date_format" placeholder="dd.mm.yyyy" name="date_of_birth" value="<?=$date_of_birth?>"/>
				<?php
				if ($isPost && !preg_match($date_of_birth_pattern, $date_of_birth)) {
						$isValid=FALSE
					?>
					<span class="error">Please, provide correct format of date of birth</span>
				<?php }	?>				
			</dd>

			<dt>Gender:</dt>
			<dd>
				<input type="radio" name="gender">Male
			</dd>
			<dd>
				<input type="radio" name="gender">Female
			</dd>

			<dt>Marital Status</dt>
			<dd>
				<input type="checkbox" name="marital"/>Single
			</dd>
			<dd>
				<input type="checkbox" name="marital"/>Married
			</dd>
			<dd>
				<input type="checkbox" name="marital"/>Divorced
			</dd>
			<dd>
				<input type="checkbox" name="marital"/>Widowed
			</dd>

			<dt>Adress:</dt>
			<dd>
				<input type="text" name="adress" value="<?=$adress?>"/>
			<?php if($isPost && !preg_match($adresspattern, $adress))
			{
				$isValid=FALSE
			?>
				<span class="error">Please, provide correct adress</span>
			<?php } ?>	
			</dd>

			<dt>City: </dt>
			<dd>
				<input type="text" name="city" value="<?=$city?>"/>
			<?php if($isPost && !preg_match($citypattern, $city))
				{
					$isValid=FALSE
			?>
				<span class="error">Please, provide correct city</span>
			<?php } ?>
			</dd>

			<dt>Postal Code:</dt>
			<dd>
				<input type="text" name="postal" placeholder="000000" value="<?=$postal?>">
				<?php if($isPost && !preg_match($postalpattern, $postal))
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct postal code(6 digit)</span>
			<?php } ?>
			</dd>

			<dt>Home Phone Number: </dt>
			<dd>
				<input type="text" name="homephone" placeholder="** *******" value="<?=$homephone?>">
				<?php if ($isPost && !preg_match($phonepattern, $homephone)) 
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct phone number(9 digit)</span>
			<?php } ?>
			</dd>

			<dt>Mobile Phone Number: </dt>
			<dd>
				<input type="text" name="mobilephone" placeholder="** *******" value="<?=$mobilephone?>">
				<?php if ($isPost && !preg_match($phonepattern, $mobilephone)) 
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct phone number(9 digit)</span>
			<?php } ?>
			</dd>
			<dt>Credit Card Number </dt>
			<dd>
				<input type="text" name="credit" placeholder="**** **** **** ****" value="<?=$credit?>"/>
				<?php if($isPost && !preg_match($creditpattern, $credit))
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct credit number</span>
			<?php } ?>
			</dd>

			<dt>Credit Card Expiry Date</dt>
			<dd>
				<input type="text" name="credit_date" placeholder="dd.mm.yyyy" value="<?=$credit_date?>"/>
				<?php if($isPost && !preg_match($credit_datepattern, $credit_date))
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct credit card expiry </span>
			<?php } ?>
			</dd>

			<dt>Monthly Salary</dt>
			<dd>
				UZS <input type="text" name="salary" placeholder="***,***.***" value="<?=$salary?>"/>
				<?php if($isPost && !preg_match($salarypattern, $salary))
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct monthly salary</span>
			<?php } ?>
			</dd>

			<dt>Web Site URL</dt>
			<dd>
				<input type="text" name="website" value="<?=$website?>"/>
				<?php if($isPost && !preg_match($websitepattern, $website))
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct website URL</span>
			<?php } ?>
			</dd>
			
			<dt>Overall GPA</dt>
			<dd>
				<input type="text" name="gpa" value="<?=$gpa?>"/>
				<?php 
				$gpa=(float)$gpa;
				if($isPost && !preg_match($gpapattern, $gpa) && ($gpa<0 | $gpa>4.5))
				{
					$isValid=FALSE
				?>
				<span class="error">Please, provide correct GPA format(0.0)</span>
			<?php }	?>
			</dd>


		</dl>
				<input type="submit" value="Submit" />     
				<?php  if($isPost && $isValid) 
				{       
					header("Location: success.php", TRUE, 301);      
				}     
				?>    
		</form>
		<div>
			Register
		</div>
	</body>
</html>