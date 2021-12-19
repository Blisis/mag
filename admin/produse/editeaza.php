<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();
$id=$_GET['id'];

$produs=$database->query("
select p.* 
from produse as p  
where p.id={$id} 
;")->fetch_all(MYSQLI_ASSOC);
$produs=reset($produs);
/*array(11) {
    ["id"]=> string(1) "4"
    ["nume"]=> string(8) "laptop 2"
    ["descriere"]=> string(15) "asdfasdfhfgjdgj"
    ["pret"]=> string(5) "12.00"
    ["stoc"]=> string(1) "1"
    ["poza"]=> string(22) "1635018567_38083_2.png"
    ["greutate"]=> string(5) "12.00"
    ["lungime"]=> string(5) "12.00"
    ["latime"]=> string(5) "12.00"
    ["id_categorie"]=> string(1) "1"
    ["data"]=> string(19) "2021-12-13 23:23:33" }

var_dump($produs);
die();
*/

$erori=[];
if (ispost()) {
//validam datele
    //nume
    if($_POST['nume']==null){
        $erori['invald_nume'] = "Numele nu este completat!";
    };
    //descriere
if (strlen($_POST['descriere']) <= 10) {
    $erori['invalid-descriere'] = "Descrierea nu este completata!";
};
    //pret
    if (strlen($_POST['pret']) <= 10) {
        $erori['invalid-pret'] = "Pretul nu este completat!";
    };
    //stoc
    // nu avem ce if sa punem la stoc!!

    //greutate
    if (strlen($_POST['greutate']) <= 10) {
        $erori['invalid-greutate'] = "Greutatea nu este completata!";
    };
    //lungime
    if (strlen($_POST['lungime']) <= 10) {
        $erori['invalid-lungime'] = "Lungimea nu este completata!";
    };
    //latime
    if (strlen($_POST['latime']) <= 10) {
        $erori['invalid-latime'] = "Latimea nu este completata!";
    };
    //id_categorie



    // dupa validare( count de erori = 0) facem update in db
    if (count($erori) == 0 ) {
        $nume=$_POST['nume'];
        $descriere=$_POST['descriere'];
        $pret = $_POST['pret'];
        $stoc = $_POST['stoc'];
        $greutate =$_POST['greutate'];
        $lungime =$_POST['lungime'];
        $latime =$_POST['latime'];
        $database->query("update produse 
                    set nume ='{$nume}' , 
                        descriere='{$descriere}' ,
                        greutate='{$greutate}',
                        pret='{$pret}',
                        stoc='{$stoc}',
                        lungime='{$lungime}',
                        latime='{$latime}',
                     where id='{$id}'");
    }
    else{
        var_dump($erori);
    };

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
                        <h1 class="m-0">Editeaza <?php echo $produs['nume']; ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo url;?>admin/dashbord.php">Home</a></li>
                            <li class="breadcrumb-item active">Editeaza produsul <?php echo $produs['nume']; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" >
                               <h1> <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $produs['nume']; ?>"></h1>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img src="<?php url?>imagini/produse/<?php echo$produs['poza'] ?>" class="img-responsive"  style="">
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-3">
                                Descriere:
                            </div>
                            <div class="col-md-9">
                                <div class="form-group" >
                                    <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $produs['descriere']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                Greutate:
                            </div>
                            <div class="col-md-9">
                                <div class="form-group" >
                                    <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $produs['greutate']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                Lungime:
                            </div>
                            <div class="col-md-9">
                                <div class="form-group" >
                                    <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $produs['lungime']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                Latime:
                            </div>
                            <div class="col-md-9">
                                <div class="form-group" >
                                    <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $produs['latime'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                A fost adaugat pe :
                            </div>
                            <div class="col-md-9">
                                <div class="form-group" >
                                    <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $produs['data'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                Pret :
                            </div>
                            <div class="col-md-9">
                                <div class="form-group" >
                                    <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $produs['pret']; ?>">
                                </div>

                            </div>
                    </div>
                        <button class="btn btn-warning btn-sm"> Salveaza informatiile</button>

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