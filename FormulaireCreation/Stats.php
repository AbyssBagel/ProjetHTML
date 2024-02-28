<?php
$Data = array(
    'tab' => "character",
    'str' => $_POST['str'],
    'dex' => $_POST['dex'],
    'con' => $_POST['con'],
    'int' => $_POST['int'],
    'wis' => $_POST['wis'],
    'cha' => $_POST['cha']
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