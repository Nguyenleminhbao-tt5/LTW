<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$data = new mysqli($servername, $username, $password,"manage");

// Check connection
if ($data->connect_error) {
  die("Connection failed: " . $data->connect_error);
}
?>