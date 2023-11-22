<?php

include 'connection.php';

$completeName = $_POST['completeName'];
$birthDay = $_POST['birthDay'];
$nickname = $_POST['nickname'];
$password = sha1($_POST['password']);
$about = $_POST['about'];

$response = array();

$sql = "SELECT COUNT(*) AS countNicknames
FROM Player
WHERE nickname = '$nickname'";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $countNicknames = $row['countNicknames'];

    if ($countNicknames > 0) {
        $response['status'] = 'warning';
        $response['message'] = 'Este nickname ja está em uso';
    } else {
        $sql = "INSERT INTO Player (completeName, birthDay, nickname, password, about)
        VALUES ('$completeName', '$birthDay', '$nickname', '$password', '$about')";


        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Registro inserido com sucesso!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Erro ao inserir registro: ' . $conn->error;
        }
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Falha ao se comunicar com o banco de dados';
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
