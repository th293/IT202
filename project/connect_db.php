<?php
$Username = filter_input(INPUT_POST, 'username');
$Password = filter_input(INPUT_POST, 'password');
if (!empty($Username)){
if (!empty($Password)){
$host = "sql1.njit.edu";
$dbusername = "th293";
$dbpassword = "tanager32";
$dbname = "th293";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO account (username, password)
values ('$Username','$Password')";
if ($conn->query($sql)){
echo "New Customer is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
?>
