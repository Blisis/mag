<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();
$produse=$database->query("select
        p.* , c.nume as nume_cat
        from produse AS p
        left join categorii AS c on p.id_categorie=c.id
        ")->fetch_all(MYSQLI_ASSOC);


?>

<!-- Aici HTML, afisarea efectiva a elementelor in pagina -->

<html>
<head>
    <?php
    include"../../theme/admin_css.php"
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!--        navbar here-->
    <?php include "../../theme/nav.php"; ?>
    <!-- aside here-->
    <?php include "../../theme/meniu.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Acasa</a></li>
                            <li class="breadcrumb-item active">Listeaza Produse</li>
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
                    <div class="col-md-12">
                    <div class="float-right">

                        <a href="<?php echo url ;?>admin/produse/creeaza.php" class="btn btn-success">Adauga produs nou</a>
                    </div>
                    </div>
                </div>
                <br>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                <?php
                foreach ($produse as $produs) {
                    ?>
                    <div class="col-md-3">
                    <div class="card">
<!--                   <img src="--><?php //echo url; ?><!--imagini/produse/--><?php //echo $produs['poza']; ?><!--"  >-->
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php
                                echo $produs['nume'];
                                ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php
                                echo $produs['pret'];
                                ?></li>
                            <li class="list-group-item"><?php
                                echo $produs['stoc'];
                                ?></li>
                        </ul>
                        <div class="card-body">
                            <a href="<?php echo url;?>admin/produse/editeaza.php?id=<?php echo $produs['id']; ?>" class="btn btn-warning btn-sm"  >Editeaza</a>
                            <a href="<?php echo url;?>admin/produse/sterge.php?id=<?php echo $produs['id']; ?>" class="btn btn-danger btn-sm">Sterge</a>
                        </div>
                    </div>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </section>
    </div>

</div>
<?php
include "../../theme/admin_js.php"
?>

</body>
</html>