<?php
header("Content-Type: application/json; charset=UTF-8");

include 'db_connect.php';

// query data from database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// transferring data returned from query to array
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// convert array to JSON format and print to screen
echo json_encode($data);

// close database connection
$conn->close();
?>