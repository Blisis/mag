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

$comenzi=$database->query("select count(c.id) as n from comenzi as c")->fetch_all(MYSQLI_ASSOC);
$comenzi=reset($comenzi);

$comenzi_noi=$database->query("select count(c.id) as n from comenzi as c where status='trimis'")->fetch_all(MYSQLI_ASSOC);
$comenzi_noi=reset($comenzi_noi);


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
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                                Useri :
                            </div>
                            <div class="col-md-8">
                                <?php echo $useri['n'] ;?>-Total useri <br>
                                <?php echo $useri_noi['n'] ;?>-Useri noi <br>
                                <?php echo $useri_activi['n'] ;?>-Useri activi <br>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                        <div class="col-md-4">
                            Comenzi:
                        </div>
                        <div class="col-md-8">
                            <?php echo $comenzi['n'] ;?>-Total comenzi <br>
                            <?php echo $comenzi_noi['n'] ;?>- Comenzi noi <br>
                            <?php echo $useri_activi['n'] ;?>-Comenzi  <br>
                            <?php echo $useri_activi['n'] ;?>-Comenzi  <br>
                            <?php echo $useri_activi['n'] ;?>-Comenzi  <br>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                            Mesaje:
                            </div>
                            <div class="col-md-8">
                            -Total mesaje <br>
                            -Mesaje noi <br>
                            </div>


                        </div>
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