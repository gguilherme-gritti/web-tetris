<?php

session_start();

var_dump($_SESSION);

if (!isset($_SESSION['userId']) || !$_SESSION['userId']) {
    header('Location: index.html');
}
