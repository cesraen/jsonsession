<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbforjson";

// connecting db using MYSQL
$conn = new mysqli($servername, $username, $password, $database);

// check connect
if ($conn->connect_error) {
    die("Error! Can't connect database: " . $conn->connect_error);
}
?>
