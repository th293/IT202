<?php
//TODO add error handling

//load the config from the same directory
require('config.php');
echo "Loaded host: " . $host;

try{
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);
		echo "Connected";
		}
		catch(Exception $e){
			echo $e->getMessage();
				echo "Something went wrong";
				}

?>
