<?php
// functionalitate php, ce face pagina asta efectiv
include "../../global/functii.php";
require_once "../../global/db.php";
$database = Database::getInstatnta();

$categorii= $database->query(" 
 SELECT * FROM  categorii
;")->fetch_all(MYSQLI_ASSOC);
$catcuid=[];
foreach ($categorii as $categorie) {
    $catcuid[$categorie['id']] = $categorie;
}
$categoriiCuCopii = [];

foreach ($catcuid as $key => $categorie) {
    if ((int)$categorie['id_parinte'] !== 0) {
        if(isset($categoriiCuCopii[$categorie['id_parinte']])) {
            $categoriiCuCopii[$categorie['id_parinte']]['copii'][] = $categorie;
        }
    } else {
        $categoriiCuCopii[$key] = $categorie;
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
                        <h1 class="m-0">Listare Categorii</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashbord.php">Home</a></li>
                            <li class="breadcrumb-item active">Listare categorii</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" >
                <!-- Small boxes (Stat box) -->
                <table class="table table-striped  table-sm">
                    <thed>
                        <td>#</td>
                        <td>nume</td>
                        <td>editeaza</td>
                    </thed>
                    <tbody>

                    <?php
                    foreach ($categoriiCuCopii as $categorie){?>
                    <tr>
                        <td>
                            <a href="" class="parent" data-id="<?php echo $categorie['id'];?>">
                                &darr;
                            </a>
                        </td>
                        <td><?php echo $categorie['nume'];?></td>
                        <td>
                            <a href="editeaza.php?id=<?php echo $categorie['id']; ?>" class="btn btn-warning btn-xs">Editeaza</a>
                            </td>
                    </tr>
<?php if (isset($categorie['copii'])){
    foreach ($categorie['copii']as $copil) {
        ?>
                    <tr class="d-none child-<?php echo $copil['id_parinte'];?>">
                        <td></td>
                        <td style="padding-left: 40px"><?php echo $copil['nume'];?></td>
                        <td><a href="editeaza.php?id=<?php echo $categorie['id']; ?>" class="btn btn-warning btn-xs">Editeaza</a></td>
                    </tr>
    <?php
                    }
                        }
                    }


                    ?>

                    </tbody>
                </table>
            </div>
        </section>
    </div>

</div>
<?php
include "../../theme/admin_js.php"
?>
<script>
    $('.parent').on('click',function (e) {
        e.preventDefault();
        let id=$(this).data('id');
        let clasa=".child-"+id;
        $(clasa).toggleClass('d-none');
        console.log(clasa);
        return false;
    })
</script>
</body>
</html>