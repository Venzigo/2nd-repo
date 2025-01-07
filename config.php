<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "auth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  

  // SQL query to check user credentials
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);


  if ($result->num_rows > 0) {
    echo "Login successful. Welcome " . $username . "!";
  } else {
    echo "Invalid username or password.";
  }
}
$conn->close();
?>
