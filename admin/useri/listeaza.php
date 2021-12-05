<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();
$useri=$database->query("SELECT * FROM useri ")->fetch_all(MYSQLI_ASSOC);


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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Afisare Useri</li>
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
                    <table class="table table-striped  table-sm" border="2">
                        <thead class="table-dark">
                        <td>Nume</td>
                        <td>E-mail</td>
                        <td>Telefon</td>
                        <td>Adresa</td>
                        <td>Vehime</td>
                        <td>Numarul de comenzi</td>
                        <td>Ultima data pe site</td>
                        <td>Editeaza</td>
                        </thead>
                    <?php
                    foreach ($useri as $user) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                if($user['nume']!=null) {
                                    echo $user['nume'];
                                    }
                                else{
                                    echo "Nu este completat!";
                                    }

                                 ?>
                            </td>
                            <td>
                                <?php
                                if($user['email']!=null) {
                                    echo $user['email'];                                }
                                else{
                                    echo "Nu este completat!";
                                }


                                ?>
                            </td>
                            <td>
                                <?php
                                if($user['telefon']!=null) {
                                    echo $user['telefon'];                               }
                                else{
                                echo "Nu este completat!";}

                                ?>
                            </td>
                            <td>
                                <?php
                                if($user['adresa']!=null) {
                                    echo $user['adresa'];
                                }
                                else{
                                echo "Nu a completat adresa!";}

                                ?>
                            </td>
                            <td><?php echo $user['vechime']; ?></td>
                            <td>
                                <?php
                                if($user['numar_comenzi']!=null) {
                                    echo $user['numar_comenzi'];
                                }
                                else{
                                echo "Nu are comenzi";}

                                ?>
                            </td>
                            <td><?php echo $user['last_login'] ?></td>
                            <td>
                                <div class="card-body">
                                    <a href="<?php echo url;?>admin/useri/edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm"  >Editeaza</a>
                                </div>
                            </td>
                        </tr>
                        </div>
                <br>
                        <?php
                    }
                    ?>
            </table>
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