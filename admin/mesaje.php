<?php
// functionalitate php, ce face pagina asta efectiv
include "../global/functii.php";
require_once "../global/db.php";
$database = Database::getInstatnta();
$mesaje=$database->query("select  m.id,m.subiect,m.email,m.data,m.status,m.id,u.nume,u.email,u.telefon from mesaje as m
join useri as u
where u.id=m.id_user order by m.data desc;
;")->fetch_all(MYSQLI_ASSOC);
?>
<!-- Aici HTML, afisarea efectiva a elementelor in pagina -->
<html>
<head>
    <?php
    include"../theme/admin_css.php"
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!--        navbar -->
    <?php include "../theme/nav.php"; ?>
    <!-- aside -->
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- aici incepe tabelul  -->
                    <table class="table table-striped  table-sm" border="2">
                        <thead class="table-dark">
                        <td>Status Mesaj</td>
                        <td>Nume Utilizator</td>
                        <td>Email Utilizator</td>
                        <td>Subiect</td>
                        <td>Data Mesajului</td>
                        <td>Vizualizare</td>
                        </thead>
                        <?php
                        foreach ($mesaje as $mesaj)
                        {?>
                            <tr>
                                <div class="col-md-3">
                                    <div class="card">
                                        <td><?php
                                            if($mesaj['status']==0){
                                              ?>
                                                <p style="color:orangered;background: yellow; font-size: large" ><b>Mesaj nou!</b></p>
                                            <?php
                                            } else if($mesaj['status']==1){?>
                                                <p style="color:">Mesaj Deschis</p>
                                            <?php
                                            }else if($mesaj['status']==2){
                                               ?>
                                            <p style="color: darkblue;background: springgreen">  Ai raspuns!</p>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php
                                            echo $mesaj['nume'];
                                            ?></td>
                                        <td>
                                            <?php echo $mesaj['email'];

                                            ?>
                                        </td>
                                        <td><?php echo $mesaj['subiect'];
                                            ?></td>
                                        <td>
                                            <?php echo $mesaj['data'];
                                            ?>
                                        </td>
                                        <td>
                                            <!-- aici faci butonul de editare comanda -->
                                            <div class="card-body">
                                                <a href="<?php echo url;?>admin/raspunde_mesaj.php?id=<?php echo $mesaj['id']; ?>" class="btn btn-outline-success btn-sm" >Afiseaza</a>
                                            </div>
                                        </td>
                                    </div>
                                </div>
                            </tr>
                        <?php   }
                        ?>
                </div>
        </section>
    </div>
</div>
<?php
include "../theme/admin_js.php"
?>
</body>
</html>