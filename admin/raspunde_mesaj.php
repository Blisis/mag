<?php
require_once "../global/db.php";
require_once "../global/functii.php";
$database=Database::getInstatnta();
$id=$_GET['id'];
$mesaj=$database->query("
select * from mesaje where id={$id}; 
")->fetch_all(MYSQLI_ASSOC);
$mesaj=reset($mesaj);
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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Toate Mesajele</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php url?>admin/dashbord.php">Acasa</a></li>
                            <li class="breadcrumb-item active">Toate Mesajele</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->




</body>
</html>