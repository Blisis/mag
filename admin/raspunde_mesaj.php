<?php
require_once "../global/db.php";
require_once "../global/functii.php";
$database=Database::getInstatnta();
// functionalitate php, ce face pagina asta efectiv
?>
<html>
<head>
    <?php include"../theme/admin_css.php"  ?>
</head>
<body>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- navbar here-->
    <?php include "../theme/nav.php"; ?>
    <!-- a-side here-->
    <?php include "../theme/meniu.php"; ?>







</body>
</html>