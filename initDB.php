<?php
//TODO add error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




//load the config from the same directory

require('config.php');
echo "Loaded host: " . $host;

//new lines below

try{
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	$query= "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
			`username` varchar(30) not null unique,
				`pin` int default 0,
					PRIMARY KEY (`id`)
					) CHARACTER SET utf8 COLLATE utf8_general_ci
					";
$stmt = $db->prepare($query);
$r = $stmt->execute();
//just to see the value (should be 1)
echo "<br>" . $r . "<br>";

//Note backticks ` for table/column names and single-quotes ' for string value
//hint: we don't need to specify `id` since it's auto increment (note this in the next steps)
$insert_query = "INSERT INTO `TestUsers`(`username`, `pin`) VALUES (:username, :pin)";
$stmt = $db->prepare($insert_query);
$newUser = "Billy";
$newPin = 1234;

$r = $stmt->execute(array(":username"=> $newUser,":pin"=>$newPin));
$user = "JohnDoe";
$pin = 1234;
$select_query = "select * from `TestUsers` where username = :username";


//previous connection/query prep/etc
$stmt=$db->prepare($select_query);
$stmt->execute(array(':username'=> $user));
$result = $stmt->fetch();
echo "<br><pre>" . var_export($result, true) . "</pre><br>";
}
catch(Exception $e){
	echo $e->getMessage();
	echo "Something went wrong";
}
?>

