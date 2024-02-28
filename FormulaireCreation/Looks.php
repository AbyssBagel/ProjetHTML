<?php
$Data = array(
    'tab' => "character",
    'age' => $_POST['age'],
    'height' => $_POST['height'],
    'weight' => $_POST['weight'],
    'eyeColor' => $_POST['eyeColor'],
    'skinColor' => $_POST['skinColor'],
    'hairColor' => $_POST['hairColor']
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "json_import_db.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $Data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>