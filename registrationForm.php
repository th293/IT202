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

<form onsubmit="return false;">

<input name="email" type="email" placeholder="Enter your Email"/>
<input name="emailconfirm" type="email" placeholder="Re-enter Email"/>
<input name="password" type="password" placeholder="Enter your password"/>
<input name="passwordconfirm" type="password" placeholder="Re-enter your password"/>
<input name="username" placeholder="Username"/>

<input type="submit" value="Submit"/>

</form>


<?php checkPasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
