<?php
include 'connection.php';

$user = $_POST['user'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM Player WHERE nickname = '$user' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['status'] = 'success';
    $response['message'] = 'Login bem-sucedido';
    $response['userData'] = $row;
} else {
    $response['status'] = 'error';
    $response['message'] = 'Usuário ou senha incorretos';
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
