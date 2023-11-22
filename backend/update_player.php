<?php
include 'connection.php';

session_start();
$id = $_SESSION["userId"];

$completeName = $_POST['completeName'];
$birthDay = $_POST['birthDay'];
$nickname = $_POST['nickname'];
$password = sha1($_POST['password']);
$about = $_POST['about'];

$sql = "UPDATE Player SET 
        completeName = '$completeName',
        birthDay = '$birthDay',
        nickname = '$nickname',
        password = '$password',
        about = '$about'
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Dados do usuário atualizados com sucesso.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Erro ao atualizar dados do usuário: ' . $conn->error;
}

header('Content-Type: application/json');
echo json_encode($response);
