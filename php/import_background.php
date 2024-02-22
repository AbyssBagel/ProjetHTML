<?php
$sql = "INSERT INTO background (id, name, specialtyname,description,featurename,featuredescription,nb_lang,equipment) VALUES (DEFAULT,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

// Iterate over each background to insert into database
foreach ($items as $itemname => $itemdata) {
    $name = $itemname;
    $specialtyname=$itemdata['specialtyname'];
    $description = $itemdata['description'];
    $featurename=$itemdata['featurename'];
    $featuredescription=$itemdata['featuredescription'];
    $nb_lang=$itemdata['nb_lang'];
    $equipment=$itemdata['equipment'];

    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'sssssis', $name, $specialtyname, $description, $featurename, $featuredescription, $nb_lang, $equipment);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Background '$name' imported successfully.";
    } else {
        echo "Error importing background '$name': " . mysqli_stmt_error($stmt);
    }
}
// Close the prepared statement
mysqli_stmt_close($stmt);