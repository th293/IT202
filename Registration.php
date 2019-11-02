
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>

<html>
<h1><center>Registration Page</center></h1>
<head>
<script>
  function validate(){
	var form = document.forms[0];
	var password = form.password.value;
	var conf = form.passwordconfirm.value;
	let succeeded = true;
	var elemid = "pass";
	let elem = document.createElement("div");
	console.log(password);
	if(password == conf)
	{

		elem.id = "passwordvalidation";
		document.body.appendChild(elem);
		elem.innerText = "Passwords Match";
	
	}
	else
	{
	
		document.body.appendChild(elem);
		elem.innerText = "Paasword didn't match";

	}
}

</script>
</head>
<body>

<form onsubmit="return false;">
Username: <input name="username" methof ="text" placeholder="User Name"/>
Email: <input name="email" type="email" placeholder="Email"/>
Confirm Email: <input name="emailconfirm" type="email" placeholder="Re-enter Email"/>
Password: <input name="password" type="password" placeholder="Password" onchange="validate();"/>
Confirm Password: <input name="passwordconfirm" type="password" placeholder="re-Enter Password"onchange="validate();"/>


<input type="submit" value="Submit"/>
</form>
</body>
</html>

