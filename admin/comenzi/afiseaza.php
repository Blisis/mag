<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();
$id=$_GET['id'];
$produse = $database->query("
select pc.pret, pc.cantitate, p.id, p.nume, p.poza, p.stoc
from produse_comenzi as pc
         join produse as p on p.id = pc.id_produse
where pc.id_comenzi = {$id}
;")->fetch_all(MYSQLI_ASSOC);

?>

<!-- Aici HTML, afisarea efectiva a elementelor in pagina -->

<html>
<head>
    <?php
    include "../../theme/admin_css.php"
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
                        <h1 class="m-0">Afiseaza comanda cu numarul <?php echo $id; ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Comanda cu numarul <?php echo $id; ?></li>
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
                    ID COMANDA
                    <br>
                    <?php echo $_GET['id']; ?>
                    <table class="table table-striped  table-sm" border="2">
                        <thead class="table-dark">
                            <td>Id Produs</td>
                            <td>Poza Produs</td>
                            <td>Nume Produs</td>
                            <td>Pret</td>
                            <td>Cantitate</td>
                            <td>Disponibilitate</td>
                        </thead>
                            <?php
                            foreach ($produse as $produs){
                                ?>
                                <tr>
                                  <td><?php echo $produs['id']; ?></td>
                                  <td><img src="<?php echo url."imagini/produse/".$produs['poza']; ?>" alt=""></td>
                                  <td><?php echo $produs['nume']; ?></td>
                                  <td ><?php echo $produs['pret']; ?></td>
                                  <td><?php echo $produs['cantitate']; ?></td>
                                  <td>Aveti <?php echo $produs['stoc']." bucati in stoc!";
                                  echo "<br>";
                                  if ($produs['cantitate']>=$produs['stoc']){
                                      echo "<p class='alert alert-danger'>Stocul nu este suficient!</p>";
                                  } else{
                                      echo "<p class='alert alert-success' >Cantitatea din stoc este suficienta</p>";
                                  }
                                  ?></td>
                                </tr>
                           <?php } ?>
                    </table>
                </div>
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