<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();
$comenzi=$database->query("select
       u.nume AS numeClient,u.email,u.adresa ,c.*
from comenzi AS c
left join useri AS u on c.id_user=u.id
;")->fetch_all(MYSQLI_ASSOC);

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
                        <h1 class="m-0">Toate comenziile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Toate comenziile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- aici incepe tabelul  -->
                    <table class="table table-striped  table-sm" border="2">
                        <thead class="table-dark">
                        <td>ID COMANDA</td>
                        <td>Nume Client</td>
                        <td>Email Client</td>
                        <td>Adresa de livrare</td>
                        <td>Status comanda</td>
                        <td>Data comenzii</td>
                        <td>Editeaza</td>
                        </thead>
                        <?php
                        foreach ($comenzi as $comanda)
                        {?>
                        <div class="col-md-3">
                            <div class="card">
                                <td><?php
                                    echo $comanda['id'];
                                    ?></td>
                                <td>
                                    <?php echo $comanda['numeClient'];

                                    ?>
                                </td>
                                <td><?php echo $comanda['email'];
                                    ?></td>
                                <td><?php echo $comanda['adresa'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $comanda['status'];

                                    ?>
                                </td>



                                <td><?php

                                    echo $comanda['data'];
                                ?></td>
                                <td>
<!-- aici faci butonul de editare comanda -->
                                <div class="card-body">
                                    <a href="<?php echo url;?>admin/comenzi/afiseaza.php?id=<?php echo $comanda['id']; ?>" class="btn btn-outline-success btn-sm" >Afiseaza</a>
                                    <br>
                                    <a href="<?php echo url;?>admin/comenzi/edit.php?id=<?php echo $comanda['id']; ?>" class="btn btn-warning btn-sm" >Editeaza</a>
                                </div>
                                </td>

                            </div>
                        </div>

                     <?php   }
                        ?>

            </div>
        </section>
    </div>

</div>
<?php
include "../../theme/admin_js.php"
?>

</body>
</html>