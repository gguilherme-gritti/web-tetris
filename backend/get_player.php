<?php
include 'connection.php';

session_start();
$id = $_SESSION["userId"];

$sql = "SELECT 
            Player.id,
            Player.completeName,
            Player.birthDay,
            Player.nickname,
            Player.password,
            Player.about,
            MAX(Historic.score) AS highScore,
                FIND_IN_SET(MAX(Historic.score), GROUP_CONCAT(DISTINCT Historic.score ORDER BY Historic.score DESC)) AS ranking
            FROM
                Player
            LEFT JOIN
                Historic ON Player.id = Historic.idPlayer
            WHERE
                Player.id = $id
            GROUP BY
                Player.id;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['status'] = 'success';
    $response['message'] = 'Dados do jogador encontrado com sucesso';
    $response['player'] = $row;
} else {
    $response['status'] = 'error';
    $response['message'] = 'Usuário ou senha incorretos';
}

header('Content-Type: application/json');
echo json_encode($response);
