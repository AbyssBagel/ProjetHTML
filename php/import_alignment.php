<?php

$sql = "INSERT INTO alignment (id, name, description) VALUES (DEFAULT,?,?)";
$stmt = mysqli_prepare($conn, $sql);

// Iterate over each background to insert into database
foreach ($items as $itemname => $itemdata) {
    $name = $itemname;
    $description = $itemdata['description'];
    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'ss', $name, $description);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        echo "$tablename' : '$name' imported successfully.";
    } else {
        echo "Error importing '$name' in table '$tablename': " . mysqli_stmt_error($stmt);
    }
}
// Close the prepared statement
mysqli_stmt_close($stmt);