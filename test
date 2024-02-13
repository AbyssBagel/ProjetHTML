<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'connect_database.php'; // Contains connection to database

  // We get the value from the js script
  $number = $_POST['number'];
  
  // Echo value received
  echo "Received number value: " . $number;

  // Prepare the SQL statement with a placeholder instead of value
  $sql = "INSERT INTO workpls (number, comment) VALUES (?, 'Here is a comment I want to see')";
  $stmt = $conn->prepare($sql);

  // Bind param
  $stmt->bind_param("i", $number);

  // Execute statement and check if error
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  //Test get all data from said table and echo it
  $sql2 = "SELECT * FROM workpls";
  $result = $conn->query($sql2);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Number: " . $row["number"]. " - Comment: " . $row["comment"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  //Close statement & database conn
  $stmt->close();
  $conn->close();
}