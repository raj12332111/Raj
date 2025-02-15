<?php
include 'db.php';

$result = $conn->query("SELECT users.username, SUM(bets.win_amount) AS total_winnings FROM bets JOIN users ON bets.user_id = users.id GROUP BY bets.user_id ORDER BY total_winnings DESC LIMIT 10");

$leaderboard = [];
while ($row = $result->fetch_assoc()) {
    $leaderboard[] = $row;
}

echo json_encode($leaderboard);
?>
