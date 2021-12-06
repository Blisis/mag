<?php

require_once "../global/db.php";
require_once "../global/functii.php";

// functionalitate php, ce face pagina asta efectiv

$database=Database::getInstatnta();
$useri=$database->query("select count(u.id) as n from useri as u")->fetch_all(MYSQLI_ASSOC);
$useri=reset($useri);
$useri_noi=$database->query("select count(u.id) as n from useri as u where vechime>=date(now())-interval 30 day")->fetch_all(MYSQLI_ASSOC);
$useri_noi=reset($useri_noi);

$useri_activi=$database->query("select count(u.id) as n from useri as u where last_login>=date(now())-interval  30 day")->fetch_all(MYSQLI_ASSOC);
$useri_activi=reset($useri_activi);
//var_dump($useri_noi);
//die();




?>

<!-- Aici HTML, afisarea efectiva a elementelor in pagina -->

<html>
<head>
    <?php
    include"../theme/admin_css.php"
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!--        navbar here-->
    <?php include "../theme/nav.php"; ?>
    <!-- aside here-->
    <?php include "../theme/meniu.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Statistici</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Acasa</a></li>
                            <li class="breadcrumb-item active">Tablou control </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                useri :
                            </div>
                            <div class="col-md-6">
                                <?php echo $useri['n'] ;?>-total useri <br>
                                <?php echo $useri_noi['n'] ;?>-useri noi <br>
                                <?php echo $useri_activi['n'] ;?>-useri activi <br>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                comenzi: -total comenzi
                        - comenzi noi
                        comenzi ....
                        comenzi ....
                        comenzi ....
                    </div>
                    <div class="col-md-3">
                mesaje
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
<?php
include "../theme/admin_js.php"
?>

</body>
</html>