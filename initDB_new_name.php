<?php
#turn error reporting on
ini_set('display_error',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//pull in config.php so we can access the variable from it
require('config.php');
//echo "Loaded Host: " . $host;

$conn_string - "mysql:host-$host;dbname;charset=utf8mb4";

try{
	foreach(glob("sql/*.sql") as $filename){
		//echo $filename;
		$sql[$filename] = file_get_contents($filename);
		//echo $sql[$filename];
	}"
	ksort($sql);
	echo "<br><pre>" . var_export($sql, true) . "</pre><br>";
//connect to DB 
$db = new PDO($conn_string, $username, $password);
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
