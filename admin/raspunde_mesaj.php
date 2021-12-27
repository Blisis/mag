<?php
require_once "../global/db.php";
require_once "../global/functii.php";
$database=Database::getInstatnta();
$id=$_GET['id'];

$mesaj=$database->query("
select m.id, m.subiect, m.mesaj, m.email, m.data, m.status, m.id_user , u.telefon,u.email,u.nume, u.vechime  from mesaje as m
join  useri as u where m.id='{$id}' && m.id_user=u.id
order by m.data asc 
")->fetch_all(MYSQLI_ASSOC);
$mesaj=reset($mesaj);
/*
  array(10) {
    *["id"]=> string(1) "7"
    *["subiect"]=> string(7) "adfasdg"
    *["mesaj"]=> string(13) "sfhstudetyirf"
    *["email"]=> string(24) "radu.chirita92@gmail.com"
    *["data"]=> string(19) "2021-10-23 18:29:34"
    *["status"]=> string(1) "2"
    ["id_user"]=> string(1) "1"
    *["telefon"]=> string(13) "0722588858855"
    *["nume"]=> string(5) "Radu "
    *["vechime"]=> string(19) "2021-10-10 02:34:47"
}
var_dump($mesaj);
die();
*/


// functionalitate php, ce face pagina asta efectiv
?>
<html>
<head>
    <?php include"../theme/admin_css.php"  ?>
</head>
<body>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- navbar here-->
    <?php include "../theme/nav.php"; ?>
    <!-- a-side here-->
    <?php include "../theme/meniu.php"; ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Toate Mesajele</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php url?>admin/dashbord.php">Acasa</a></li>
                            <li class="breadcrumb-item active">Toate Mesajele</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-6">
                        <p style="font-size: x-large">Subiet:</p>
                        <p style="font-size: x-large">Data Mesaj:</p>
                        <p style="font-size: x-large">Client:</p>
                        <p style="font-size: x-large">Email:</p>
                        <p style="font-size: x-large">Telefon:</p>
                        <p style="font-size: x-large">Vechime client:</p>
                        <p style="font-size: x-large">Mesaj:</p>
                        <p style="font-size: x-large">Status mesaj:</p>



                    </div>
                    <!-- aici trebuie sa facem partea din dreapta in care prezint mesajul  -->
                    <div class="col-md-6">
                        <p style="font-size:x-large"> <?php echo $mesaj['subiect']; ?></p>
                        <p style="font-size:x-large"> <?php echo $mesaj['data']; ?></p>
                        <p style="font-size:x-large"> <?php echo $mesaj['nume']; ?></p>
                        <p style="font-size:x-large"> <?php echo $mesaj['email']; ?></p>
                        <p style="font-size:x-large"> <?php echo $mesaj['telefon']; ?></p>
                        <p style="font-size:x-large"> <?php echo $mesaj['vechime']; ?></p>
                        <p style="font-size:x-large"> <?php echo $mesaj['mesaj']; ?></p>
                        <p style="font-size:x-large">
                            <?php
                            if ($mesaj['status']==0){
                                echo "MESAJ NOU";
                            }else if ($mesaj['status']==1){
                                echo "MESAJ CITIT";
                            }else if ($mesaj['status']==2){
                                echo "MESAJ FINALIZAT";
                            }
                             ?>



                        </p>


                    </div>


                </div>
        </section>




</body>
</html>