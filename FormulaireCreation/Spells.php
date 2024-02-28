<?php
if (isset($_POST['spell']) && is_array($_POST['spell'])) {
    // Iterate through the checked checkboxes
    foreach ($_POST['spell'] as $checkedSpell) {
        // C'est un append ça apparemment
        $Data[] = $checkedSpell;
    }
    array_unshift($Data, 'tab' => "character spell"); //Ajoute a la première ligne
} else {
    // No checkboxes were checked
    echo "No checkboxes were checked.";
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "json_import_db.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $Data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>

