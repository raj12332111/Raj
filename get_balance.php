<?php
include 'db.php';

$username = $_GET['username'];
$result = $conn->query("SELECT balance FROM users WHERE username='$username'");

if ($row = $result->fetch_assoc()) {
    echo json_encode(["balance" => $row['balance']]);
} else {
    echo json_encode(["error" => "User not found"]);
}
?>
