<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//File to connect to the database
require_once 'connect_to_database.php';
$username = $_POST['username'];
$password = $_POST['password'];
$hash_password='';

$sql= "Select password from users where username=?";
$stmt = mysqli_prepare($conn, $sql);

//Bind parameters
mysqli_stmt_bind_param($stmt, 's', $username);

//Execute statement
if (mysqli_stmt_execute($stmt)) {
    //get result from database
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        $hashed_password = $row['password'];
        //Verify hashed password retrieved from database
        if (password_verify($password, $hashed_password)) {
            echo "Password for user '$username' is correct. '$password' is the password.";
        } else {
            echo "Incorrect password for user '$username'. '$password' is the password.";
        }
    } else {
        echo "User '$username' not found.";
    }
} else {
    echo "Error executing statement: " . mysqli_stmt_error($stmt);
}
//Close everything
mysqli_stmt_close($stmt);
mysqli_close($conn);
}

