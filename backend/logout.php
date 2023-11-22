<?php
session_start();
$_SESSION['userId'] = null;
$_SESSION['nickname'] = null;
session_destroy();
header('Location: ../index.html');
exit();
