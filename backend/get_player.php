<?php
include 'connection.php';

session_start();
$id = $_SESSION["userId"];

$sql = "WITH PlayerAndRank AS (
            SELECT
                p.id,
                p.completeName,
                p.birthDay,
                p.nickname,
                p.password,
                p.about,
                h.score,
                DENSE_RANK() OVER (ORDER BY h.score DESC) AS rank
            FROM
                player p
            LEFT JOIN
                Historic h ON p.id = h.idPlayer
        )
            SELECT
                id,
                completeName,
                birthDay,
                nickname,
                password,
                about,
                MAX(score) AS highScore,
                MAX(rank) AS ranking
            FROM
                PlayerAndRank
            WHERE
                id = $id 
            GROUP BY
                id;";

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
