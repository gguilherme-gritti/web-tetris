<?php

include 'connection.php';

$completeName = $_POST['completeName'];
$birthDay = $_POST['birthDay'];
$nickname = $_POST['nickname'];
$password = sha1($_POST['password']);
$about = $_POST['about'];

$sql = "INSERT INTO Player (completeName, birthDay, nickname, password, about)
        VALUES ('$completeName', '$birthDay', '$nickname', '$password', '$about')";

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Registro inserido com sucesso!';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Erro ao inserir registro: ' . $conn->error;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
