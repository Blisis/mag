<?php
require_once "global/functii.php";

if (isset($_SESSION['user'])){
    unset($_SESSION['user']);
}
header('Location:index.php');
?>

