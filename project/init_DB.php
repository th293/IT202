<?php

require('config.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	//create table
	$query = "create table if not exists `Customer`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`password` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);


	//Binding
	$select_query = "select * from `Customer` where username = :username, password = :password";
	$stmt = $db->prepare($select_query);
	$r = $stmt->execute(array(":username"=> $username, ":password"=> $password));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	//print_r($stmt->errorInfo());
	echo "<pre>" . var_export($results, true) . "</pre>"; 

	
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
