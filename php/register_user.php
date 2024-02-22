<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Include the file to establish database connection
require_once 'connect_to_database.php';
$username = $_POST['username'];
$password = $_POST['password'];
$hash_password=password_hash($password, PASSWORD_DEFAULT);

$sql= "INSERT INTO users (id, username, password,created_at) VALUES (DEFAULT,?,?,DEFAULT)";

$stmt = mysqli_prepare($conn, $sql);

// Bind the parameters to the prepared statement
mysqli_stmt_bind_param($stmt, 'ss', $username, $hash_password);

// Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    echo "User '$username' successfully registered.";
} else {
    echo "Error registering user '$username': " . mysqli_stmt_error($stmt);
}
// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
}

