<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
if (isset($_GET['id_produs'])){
    $id_produs=$_GET['id_produs'];
    $id_user=$_SESSION['user']['id'];
    $produse=$database->query("insert into cos (`id_produs`, `cantitate`, `id_user`) values ({$id_produs},10,{$id_user})");

}
?>