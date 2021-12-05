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

$comenzi_primite=$database->query("select count(c.id) as n from comenzi as c where status='primita'")->fetch_all(MYSQLI_ASSOC);
$comenzi_primite=reset($comenzi_primite);

$comenzi_proces=$database->query("select count(c.id) as n from comenzi as c where status='procesata'")->fetch_all(MYSQLI_ASSOC);
$comenzi_proces=reset($comenzi_proces);

$comenzi_trimise=$database->query("select count(c.id) as n from comenzi as c where status='trimisa'")->fetch_all(MYSQLI_ASSOC);
$comenzi_trimise=reset($comenzi_trimise);


$comenzi_finalizate=$database->query("select count(c.id) as n from comenzi as c where status='finalizata'")->fetch_all(MYSQLI_ASSOC);
$comenzi_finalizate=reset($comenzi_finalizate);



//var_dump($useri_noi);
//die();




?>

<!-- Aici HTML, afisarea efectiva a elementhfghdfghdfghdfghdfgelor in pagina -->

<html>
<head>
    <title>Dashbord</title>
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
                            <div class="col-md-3">
                                Useri :
                            </div>
                            <div class="col-md-9">
                                <?php echo $useri['n'] ;?>-Total useri <br>
                                <?php echo $useri_noi['n'] ;?>-Useri noi <br>
                                <?php echo $useri_activi['n'] ;?>-Useri activi <br>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                        <div class="col-md-3">
                            Comenzi:
                        </div>
                        <div class="col-md-9">
                            <?php echo $comenzi['n'] ;?>-Total comenzi <br>
                            <?php echo $comenzi_primite['n'] ;?>- Comenzi noi <br>
                            <?php echo $comenzi_proces['n'] ;?>-Comenzi in procesare  <br>
                            <?php echo $comenzi_trimise['n'] ;?>-Comenzi trimise spre client <br>
                            <?php echo $comenzi_finalizate['n'] ;?>-Comenzi finalizate  <br>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-3">
                            Mesaje:
                            </div>
                            <div class="col-md-9">
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