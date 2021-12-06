<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
$titlu="Creeaza Categorie";
require_once "../../global/db.php";
$database = Database::getInstatnta();
$categorii = $database->query("SELECT * FROM categorii")->fetch_all(MYSQLI_ASSOC);
$erori=[];
$succes=0;
if (ispost()) {
    // pe post primi date din formular
    //eroare pe nume
    if (empty($_POST['nume'])) {
        $erori['nume_invalid'] = "Nume Invalid";
    }


    if (count($erori) == 0) {
        $nume = $_POST['nume'];
        $idParinte = $_POST['id_parinte'];
        $database->query("insert into `categorii`(`nume`, `id_parinte`) values ('{$nume}', '{$idParinte}')");
        $succes = 1;
    }
}

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
                            <li class="breadcrumb-item"><a href="../dashbord.php">Home</a></li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Adauga o Noua CATEGORIE!
                            </div>
                            <div class="card-body">
                                <?php if ($succes==1){
                                    echo '<div class="alert alert-success">Categoria a fost creeata cu succes</div>';
                                } ?>
                                <!-- Formular! -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label for="">Denumire CATEGORIE</label>
                                    <br>
                                    <input type="text" name="nume" placeholder="CATEGORIE NOUA">
                                    <br>

                                    <select name="id_parinte" id=""  data-placeholder="Selecteaza">
<!--                                        <option value="">Selecteaza</option>-->
                                        <?php foreach ($categorii as $categorie){ ?>
                                            <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['nume']; ?></option>
                                        <?php } ?>
                                    </select>

                                    <div>
                                        <input type="submit" class="btn btn-success" value="Insereaza">
                                    </div>



                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>

</div>
<?php
include "../../theme/admin_js.php"
?>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
</body>
</html>