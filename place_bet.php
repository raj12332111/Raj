<?php
include 'db.php';

$username = $_POST['username'];
$bet_amount = $_POST['bet_amount'];

$user_query = $conn->query("SELECT id, balance FROM users WHERE username='$username'");
if ($user = $user_query->fetch_assoc()) {
    if ($user['balance'] >= $bet_amount) {
        $new_balance = $user['balance'] - $bet_amount;
        $conn->query("UPDATE users SET balance=$new_balance WHERE id=".$user['id']);
        echo json_encode(["status" => "success", "new_balance" => $new_balance]);
    } else {
        echo json_encode(["status" => "error", "message" => "Insufficient balance"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}
?>
