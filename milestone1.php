<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['username']) && isset($_POST['password'])){
$user = $_POST['username'];
$pass = $_POST['password'];
}
require("config.php");
echo "Loaded Host: " . $host;

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

try{
    	$db = new PDO($conn_string, $username, $password);
        echo "Connected to Database Successfully!";

        $query = "CREATE TABLE if not exists `Customer` (
		 `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `username` varchar(30) not null unique,
                `password` int default 0,
                 reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT$
                 ) CHARACTER SET utf8 COLLATE utf8_general_ci";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $stmt = $db->prepare($query);
        print_r($stmt->errorInfo());
        $r = $stmt->execute();
        echo "<br>" . ($r>0?"Created table or already exists":"Failed to createe table") . "<br>";
        unset($r);


        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);



}

catch(Exception $e){

        echo $e->getMessage();
        exit("Something went wrong");
}
$db = null;

?>

