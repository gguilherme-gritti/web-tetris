<?php
include 'connection.php';

session_start();
$idPlayer = $_SESSION["userId"];

$score = $_POST['score'];
$date = $_POST['date'];
$time = $_POST['time'];

$sql = "INSERT INTO Historic (idPlayer, score, date, time) VALUES ($idPlayer, $score, '$date', '$time')";

if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Pontuação registrada com sucesso.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Erro ao registrar pontuação: ' . $conn->error;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
