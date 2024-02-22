<?php
if($tablename="bond"){
    $sql = "INSERT INTO bond (id, id_b, name,description) VALUES (DEFAULT,?,?,?)";
}elseif($tablename="flaw"){
    $sql = "INSERT INTO flaw (id, id_b, name,description) VALUES (DEFAULT,?,?,?)";
}elseif($tablename= "personalitytrait"){
    $sql = "INSERT INTO personalitytrait (id, id_b, name,description) VALUES (DEFAULT,?,?,?)";
}elseif($tablename="ideal"){
    $sql = "INSERT INTO ideal (id, id_b, name,description) VALUES (DEFAULT,?,?,?)";
}elseif($tablename="backgroundvariant"){
    $sql = "INSERT INTO backgroundvariant (id, id_b, name,description) VALUES (DEFAULT,?,?,?)";
}
$stmt = mysqli_prepare($conn, $sql);

// Iterate over each background to insert into database
foreach ($items as $itemname => $itemdata) {
    $backgroundname=$itemdata['backgroundname'];
    
    $sql2= "Select id from background where name=?";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, 's', $backgroundname);

    //Execute statement
    if (mysqli_stmt_execute($stmt2)) {
        //get result from database
        $result = mysqli_stmt_get_result($stmt2);

        // Fetch the row as an associative array
        $row = mysqli_fetch_assoc($result);
    
        if ($row) {
            $b_id = $row['id'];
        } else {
            echo "Background : '$backgroundname' not found.";
        }
    } else {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
    }
    //Close everything
    mysqli_stmt_close($stmt2);
    $name = $itemname;
    $description = $itemdata['description'];

    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'iss', $b_id, $name, $description);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Background part '$tablename' : '$name' imported successfully.";
    } else {
        echo "Error importing background part '$name' in table '$tablename': " . mysqli_stmt_error($stmt);
    }
}
// Close the prepared statement
mysqli_stmt_close($stmt);