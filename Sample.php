<!DOCTYPE html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function checkPasswords(){
	if(isset($_POST['password']) && isset($_POST['confirm'])){
		if($_POST['password'] == $_POST['confirm']){
			echo "<br>Passwords Matched!<br>";
		}
		else{
			echo "<br>Passwords didn't match!<br>";
		}
	}
}
?>
<html>
<h1>Registration Page</h1>

<head>
<script>
function myValidation(inputEle, inputName){
	var isValid = true;
	if(inputName.length > 0){
		let other = document.forms[0][inputName];
		let v1 = inputEle.value;
		let v2 = other.value;
		if(isEmpty(v1)){
			//do error empty
			isValid = false;
			console.log("Value 1 is empty");
		}
		if(isEmpty(v2)){
			//do error empty
			isValid = false;
			console.log("Value 2 is empty");
		}
		if(v1 != v2){
			//do error
			isValid = false;
			console.log("Value 1 and value 2 don't match");
		}
		if(!isEmail(inputEle)){
			//do error email
			isValid = false;
			console.log("First email input is not a valid email");
		}
		if(!isEmail(other)){
			//do error email
			isValid = false;
			console.log("Second email input is not a valid email");
		}
	}
	else{
		let v = inputEle.value;
		if(isEmpty(v)){
			isValid = false;
			console.log("Value is empty (else)");
		}
		if(!isEmail(inputEle)){
			isValid = false;
			console.log("Input is not valid email (else)");
		}
	}
	if(!isValid){
		alert("There's at least 1 problem");
	}
}
</script>
<style>
input { border: 2px solid black; }
.error {border: 1px solid red;}
.noerror {border: 2px solid black;}
</style>
<body>
<div style="margin-left: 50%; margin-right:50%;">
<div style="background-color:lightblue">

<form onsubmit="return false;">

<input name="username" placeholder="User Name" onchange="myValidation(this, '') />

<input name="email" type="email" placeholder="Email"/>
<input name="emailconfirm" type="email" placeholder="Re-enter Email"/>
<input name="password" type="password" placeholder="Password"/>
<input name="passwordconfirm" type="password" placeholder="Re-Enter Password"/>
<select name="dropdown">
	<option value="Select one">Select one</option>
	<option value="1">One</option>
	<option value="2">Two</option>
	<option value="3">Three</option>
<input type="submit" value="Submit"/>
</div>
</form>
<?php checkPasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
