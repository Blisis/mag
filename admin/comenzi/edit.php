<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();
$id=$_GET['id'];

if (ispost()){
    $status=$_POST['status'];
    $database->query("update comenzi set status ='{$status}' where id={$id}");
}

$comanda=$database->query("
select c.id, u.email ,u.telefon , c.status
from comenzi as c  join useri as u on u.id=c.id_user
where c.id={$id}
;")->fetch_all(MYSQLI_ASSOC);
$comanda=reset($comanda);



//echo "<pre>";
//var_dump($comanda);
//die();

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
                            <li class="breadcrumb-item active">Comanda nr. <?php echo $comanda['id'];?></li>
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
                <form action="<?php echo url?>/admin/comenzi/edit.php?id=<?php echo $id; ?>" method="post">
                <table class="table table-striped  table-sm" border="2">
                    <thead class="table-dark">
                    <td>Numar Comanda</td>
                    <td>E-mail client</td>
                    <td>Numar telefon</td>
                    <td>Status</td>
                    </thead>
                    <td><?php echo $comanda['id']; ?></td>
                    <td><?php echo $comanda['email'];?></td>
                    <td><?php echo $comanda['telefon'];?></td>
                    <td><select name="status" id="">
                            <option value="primita" <?php
                            echo ($comanda['status']=="primita")?"selected":"";
                            ?>>Primita</option>
                            <option value="procesata"<?php
                            echo ($comanda['status']=="procesata")?"selected":"";
                            ?>>In procesare</option>
                            <option value="trimisa"<?php
                            echo ($comanda['status']=="trimisa")?"selected":"";
                            ?>>Expediata</option>
                            <option value="finalizata"<?php
                            echo ($comanda['status']=="finalizata")?"selected":"";
                            ?>>Finalizata</option>
                        <?php echo $comanda['status'];?>

                    </select>
                        <input type="submit" class="btn btn-success btn-xs"value="Schimba status!" >
                    </td>
                </table>
                </form>

            </div>
        </section>
    </div>

</div>
<?php
include "../../theme/admin_js.php"
?>

</body>
</html>