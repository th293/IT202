<html>
<head>
<title>Add Student</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['first_name'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['first_name']);

    }

    if(empty($_POST['last_name'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else{

        // Trim white space from the name and store the name
        $l_name = trim($_POST['last_name']);

    }

    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

    }

    if(empty($_POST['user_name'])){

        // Adds name to array
        $data_missing[] = 'user name';

    } else {

        // Trim white space from the name and store the name
        $user_name = trim($_POST['user_name']);

    }

    if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'id';

    } else {

        // Trim white space from the name and store the name
        $id = trim($_POST['id']);

    }
  
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO students (first_name, last_name, email,
        street, city, state, zip, phone, birth_date, sex, date_entered,
        lunch_cost, student_id) VALUES (?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, NOW(), ?, NULL)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        i Integers
        d Doubles
        b Blobs
        s Everything Else
        
        mysqli_stmt_bind_param($stmt, "ssssssisssd", $f_name,
                               $l_name, $email, $street, $city,
                               $state, $zip, $phone, $b_date,
                               $sex, $lunch);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'User Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>

<form action="https://web.njit.edu/~th293/IT202/useradded.php" method="post">
    
    <b>Add a New Student</b>
    
<p>First Name:
<input type="text" name="first_name" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="last_name" size="30" value="" />
</p>

<p>Email:
<input type="text" name="email" size="30" value="" />
</p>

<p>User Name:
<input type="text" name="user_name" size="10" maxlength="5" value="" />
</p>

<p>ID:
<input type="text" name="id" size="5" value="" />
</p>

<p>
    <input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>
