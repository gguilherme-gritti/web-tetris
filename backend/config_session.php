<?php

$nickname = $_POST['nickname'];
$id = $_POST['id'];

session_start();

$_SESSION['nickname'] = $nickname;
$_SESSION['userId'] = $id;


header('Location: screens/game/game.php');
exit();
