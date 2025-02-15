<?php
include 'db.php';

$username = $_POST['username'];
$bet_amount = $_POST['bet_amount'];
$multiplier = $_POST['multiplier'];
$win_amount = $bet_amount * $multiplier;

$user_query = $conn->query("SELECT id FROM users WHERE username='$username'");
if ($user = $user_query->fetch_assoc()) {
    $user_id = $user['id'];
    $conn->query("INSERT INTO bets (user_id, bet_amount, multiplier, win_amount) VALUES ($user_id, $bet_amount, $multiplier, $win_amount)");
    $conn->query("UPDATE users SET balance = balance + $win_amount WHERE id=$user_id");
    echo json_encode(["status" => "success", "win_amount" => $win_amount]);
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}
?>

