<?php
// Get a connection for the database

require_once('../PDO_connect.php');
 

// Create a query for the database

$query = "SELECT first_name, last_name, email, user_name, id FROM UserInformation";

// Get a response from the database by sending the connection
// and the query

$response = @mysqli_query($dbc, $query);
// If the query executed properly proceed
if($response){
echo '<table align="left"
cellspacing="5" cellpadding="8">
<tr><td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>User Name</b></td>
<td align="left"><b>ID</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = PDO_fetch_array($response)){
echo '<tr><td align="left">' .
$row['first_name'] . '</td><td align="left">' .
$row['last_name'] . '</td><td align="left">' .
$row['email'] . '</td><td align="left">' .
$row['user_name'] . '</td><td align="left">' .
$row['id'] . '</td><td align="left">' .
echo '</tr>';
}
echo "Table UserInformation Connected Succesfully";
echo '</table>';

} else {

echo "Couldn't issue database query<br />";
 
echo PDO_error($dbc);

}

// Close connection to the database
$conn = null;

?>
