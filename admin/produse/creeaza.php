<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();

// aici mi-a iesit o parte din ce vroiam cu 2 randuri mai jos :)))
$categorii=$database->query("SELECT * FROM categorii ")->fetch_all(MYSQLI_ASSOC);
/*
incercare esuata de a comunca inte bazele de date sa creeze ceva si nu mai inteleg si nu mai stiu ce vroiam sa fac :))
  $produs = $database->query("SELECT * FROM produse WHERE u.nume = '{$nume}'")->fetch_assoc();

$database->query("insert into `categorii`(`nume`,`id_produs`)
                     values ('{$nume_categorie}')");
*/
$erori=[];
$succes=0;
if (ispost()) {
    //eroare pe nume
    if (empty($_POST['nume'])) {
        $erori['nume_invalid'] = "Nume Invalid";
    }
    //eroare pe descriere
    if (empty($_POST['descriere'])) {
        $erori['descriere_invalid'] = "Descriere Invalida";
    }
    //eroare pe pret
    if (empty($_POST['pret'])) {
        $erori['pret_invalid'] = "Pret invalid";
    }
    //eroare pe stoc
    if (empty($_POST['stoc'])) {
        $erori['stoce_invalid'] = "Stoc Invalid";
    }
    //eroare pe greutate
    if (empty($_POST['greutate'])) {
        $erori['greutate_invalid'] = "Greutate Invalida";
    }
    //eroare pe lungime
    if (empty($_POST['lungime'])) {
        $erori['lungime_invalid'] = "Lungime Invalida";
    }
    //eroare pe latime
    if (empty($_POST['latime'])){
        $erori['latime_invalid']="Latime Invalida";
    }
    //verifica imaginea
    //denumeste si du fisierul uploadat
    // $_SERVER['DOCUMENT_ROOT'] - C:/xampp/htdocs
    // DIRECTORY_SEPARATOR - pe windows e /, iar pe linux e \
    $siteRoot = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'mag'.DIRECTORY_SEPARATOR;
    $targetDir = $siteRoot.'imagini'.DIRECTORY_SEPARATOR.'produse'.DIRECTORY_SEPARATOR;
    // asta ajunge sa fie numele pozei mele la final, de exemplu 123_pozamea.jpg
    $numePoza = time().'_'.$_FILES["poza"]["name"];
    $target_file= $targetDir . $numePoza;
    // verifica dimensiunea fisierului
    $check = getimagesize($_FILES["poza"]["tmp_name"]);

    if($check !== false) {
        // aici stiu ca am o imagine, iar $uploadOk devine 1
        $uploadOk = 1;
    } else {
        // stiu ca nu am poza, de aia $uploadOk e 0
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $errori['poza_invalid'] =  "Uploadea-za o poza!.";
    } else {
        if (!move_uploaded_file($_FILES["poza"]["tmp_name"], $target_file)) {
            $errori['poza_invalid'] =  "Fisierul nu a putut fi uploadat!.";
        }
    }
    if(count($erori)==0) {
        $nume=$_POST['nume'];
        $descriere=$_POST['descriere'];
        $pret=$_POST['pret'];
        $stoc=$_POST['stoc'];
        $greutate=$_POST['greutate'];
        $lungime=$_POST['lungime'];
        $latime=$_POST['latime'];
        $id_categorie=$_POST['id_categorie'];
        $database->query("insert into `produse`(`nume`,`descriere`, `pret`,`stoc`,`greutate`,`lungime`,`latime`,`poza`,`id_categorie`) 
                   values ('{$nume}','{$descriere}','{$pret}','{$stoc}','{$greutate}','{$lungime}','{$latime}','{$numePoza}','{$id_categorie}')");
        $succes=1;

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
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Acasa</a></li>
                            <li class="breadcrumb-item active">Creeaza PRODUS NOU</li>
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
                                Adauga un produs NOU!
                            </div>
                            <div class="card-body">
                                <?php if ($succes==1){
                                    echo '<div class="alert alert-success">Produsul NOU a fost CREEAT!</div>';
                                    } ?>
                                <!-- Formular! -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label for="">Nume Produs</label>
                                    <br>
                                    <input type="text" name="nume" placeholder="Nume Produsu">
                                    <br>
                                    <label for="">Descriere Produs</label>
                                    <br>
                                    <textarea name="descriere" id="" cols="110" rows="5" placeholder="Descriere Produs"></textarea>
                                    <br>
                                    <label for="">Pret</label>
                                    <br>
                                    <input type="number" step="0.01" name="pret" placeholder="Pret">
                                    <br>
                                    <label for="">Stoc</label>
                                    <br>
                                    <input type="number" step="1" name="stoc" placeholder="stoc">
                                    <br>
                                    <label for="">Greutate</label>
                                    <br>
                                    <input type="number" step="1" name="greutate" placeholder="Greutatea in grame">
                                    <br>
                                    <label for="">Lungime</label>
                                    <br>
                                    <input type="number" step="1" name="lungime" placeholder="Lungime produs">
                                    <br>
                                    <label for="">Latime</label>
                                    <br>
                                    <input type="number" step="1" name="latime" placeholder="Latime produs">
                                    <br>
                                    <label for="">Poza Produs</label>
                                    <br>
                                    <input type="file" name="poza">
                                    <br>
                                    <br>
                                    <label for="">Acest produs face parte din categoria:</label>
                                    <br>
                                    <!-- Small button group -->
                                    <select name="id_categorie" id="plan">
                                        <option value="" selected disabled hidden>
                                                    Selecteaza Categoria
                                        </option>

                                        <?php
                                        foreach ($categorii as $categorie)
                                        {
                                            ?>
                                            <option value="<?php echo $categorie['id'];
                                            ?>
"><?php
                                                echo $categorie['nume'];
                                                ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <br>

                                    <br>
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

</body>
</html>