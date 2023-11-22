<?php
include 'connection.php';

$sql = "WITH RankedHistoric AS (
        SELECT
            idPlayer,
            score,
            ROW_NUMBER() OVER (PARTITION BY idPlayer ORDER BY score DESC) AS rank
        FROM
            Historic
        )
        SELECT
            rh.idPlayer,
            p.completeName AS userName,
            rh.score,
            rh.rank
        FROM
            RankedHistoric rh
        JOIN
            Player p ON rh.idPlayer = p.id
        WHERE
            rh.rank <= 5
        ORDER BY
            rh.idPlayer, rh.rank;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['status'] = 'success';
    $response['message'] = 'Ranking buscado com sucesso';
    $response['ranking'] = $row;
} else {
    $response['status'] = 'error';
    $response['message'] = 'Nenhum dado encontrado';
}

header('Content-Type: application/json');
echo json_encode($response);
