<?php
include 'db.php';

$username = $_POST['username'];

$sql = "INSERT INTO users (username) VALUES ('$username')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "User Registered"]);
} else {
    echo json_encode(["status" => "error", "message" => "Username already exists"]);
}
?>
