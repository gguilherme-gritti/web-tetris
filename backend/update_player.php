<?php
include 'connection.php';

session_start();
$id = $_SESSION["userId"];

$completeName = $_POST['completeName'];
$birthDay = $_POST['birthDay'];
$nickname = $_POST['nickname'];
$password = sha1($_POST['password']);
$about = $_POST['about'];

$response = array();

$sql = "SELECT COUNT(*) AS countNicknames
FROM Player
WHERE nickname = '$nickname' AND id <> $id;";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $countNicknames = $row['countNicknames'];

    if ($countNicknames > 0) {
        $response['status'] = 'warning';
        $response['message'] = 'Este nickname ja está em uso';
    } else {
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
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Erro ao atualizar dados do usuário: ' . $conn->error;
}


header('Content-Type: application/json');
echo json_encode($response);
