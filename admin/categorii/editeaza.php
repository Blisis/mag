<?php
include "../../global/functii.php";
$titlu="Editeaza Categorie";
// functionalitate php, ce face pagina asta efectiv
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
                        <h1 class="m-0"><?php echo $titlu; ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $titlu; ?></li>
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
               edit
            </div>
        </section>
    </div>

</div>
<?php
include "../../theme/admin_js.php"
?>

</body>
</html>