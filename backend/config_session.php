<?php

session_start();

if (isset($_POST['nickname']) && $_POST['nickname']) {

    $_SESSION['nickname'] = $_POST['nickname'];
    $_SESSION['userId'] = $_POST['id'];

    $response['status'] = 'success';
    $response['message'] = 'Usuário autenticado.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Usuário não autenticado.';
}

header('Content-Type: application/json');
echo json_encode($response);
