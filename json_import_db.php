<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Include the file to establish database connection
require_once 'connect_to_database.php';
$jsonfilename = $_POST['jsonfilename'];
$tablename = $_POST['tablename'];

// Read the contents of the spells.json file
$jsonData = file_get_contents($jsonfilename);

// Convert the JSON data to an associative array
$items = json_decode($jsonData, true);

// Prepare the SQL statement
if ($tablename=="spells_eng") {
    $sql = "INSERT INTO spells_eng (id, name, casting_time, components, description, duration, level, distance,school,extension) VALUES (DEFAULT,?,?,?,?,?,?,?,?,DEFAULT)";
    $stmt = mysqli_prepare($conn, $sql);

// Iterate over each spell and insert it into the database
foreach ($items as $itemname => $itemdata) {
    // Extract the spell details
    $name = $itemname;
    $casting_time=$itemdata['casting_time'];
    $components=$itemdata['components'];
    $description = $itemdata['description'];
    $duration=$itemdata['duration'];
    $level=$itemdata['level'];
    $range=$itemdata['range'];
    $school=$itemdata['school'];

    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'sssssiss', $name, $casting_time, $components, $description, $duration, $level, $range, $school);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Spell '$name' imported successfully.";
    } else {
        echo "Error importing spell '$name': " . mysqli_stmt_error($stmt);
    }
}
// Close the prepared statement
mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
}

