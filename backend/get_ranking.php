<?php
include 'connection.php';

$topRankingArray = array();

$sql = "WITH RankedHistoric AS (
        SELECT
            idPlayer,
            score,
            DENSE_RANK() OVER (ORDER BY score DESC) AS rank
        FROM
        Historic
                    )
        SELECT                                                              
            rh.idPlayer,
            p.nickname,
            rh.score,
            rh.rank
        FROM
            RankedHistoric rh
        JOIN
            player p ON rh.idPlayer = p.id
        WHERE
            rh.rank <= 5
        ORDER BY        
            rh.rank;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $topRankingArray[] = $row;
    }
}
