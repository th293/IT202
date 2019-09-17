<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('config.php');
echo $host;
$connection_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($connection_string, $username, $password);
	echo "Should have connected";
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
	echo "<br>" . $r . "<br>";
}
catch(Exception $e){
	echo $e->getMessage();
	exit("It didn't work");
}
?>
