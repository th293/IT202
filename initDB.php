<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('config.php');

echo "Loaded Host: " . $host;

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	foreach(glob("sql/*.sql") as $TestUsers){
		echo $TestUsers;
		$sql[$TestUsers] = file_get_contents($TestUsers);
		echo $sql[$TestUsers];
	}
	ksort($sql);
	echo "<br><pre>" . var_export($sql,true) . "</pre></br>";



	//connect to DB
	$db = new PDO($conn_string, $username, $password);
	//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	foreach($sql as $key => $value){
		echo "<br>Running: " . $key;
		$stmt = $db->prepare($value);
		$result = $stmt->execute();
		$error = $stmt->errorInfo();
		if($error && $error[0] !== '00000'){
			echo "<br>Error:<pre>" . var_export($error,true) . "</pre><br>";
		}
		echo "<br>$key result: " . ($result>0?"Success":"Fail") . "<br>";
	}
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>

