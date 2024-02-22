<?php

  $servername = "localhost";  // Replace with your database host
  $username = "root";      // Replace with your database username
  $password = "";      // Replace with your database password
  $dbname = "projet_html";            // Replace with your database name
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";