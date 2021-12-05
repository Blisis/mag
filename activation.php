<?php
require_once "global/db.php";
require_once "global/functii.php";
$database = Database::getInstatnta();

$token = $_GET['token'];

if (checkActivationToken($token, $database)) {
    header('Location: /mag/?message=success');
}

echo "Token invalid!";