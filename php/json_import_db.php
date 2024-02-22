<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Include the file to establish database connection
require_once 'connect_to_database.php';
$jsonfilename = $_POST['jsonfilename'];
$tablename = $_POST['tablename'];

// Read the contents of the spells.json file
$jsonData = file_get_contents('../'.$jsonfilename);

// Convert the JSON data to an associative array
$items = json_decode($jsonData, true);

// Prepare the SQL statement
if ($tablename=="spells_eng") {
    include 'import_spells_eng.php';
}elseif($tablename=="background"){
    include 'import_background.php';
}elseif($tablename=="bond" || $tablename== "flaw" || $tablename== "personalitytrait" || $tablename== "ideal"){
    include 'importing_background_parts/import_bonds_pt_flaw_ideal.php';
}


// Close the database connection
mysqli_close($conn);
}

