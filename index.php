<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$produse=$database->query("select p.* , c.nume as nume_cat from produse AS p left join categorii AS c on p.id_categorie=c.id;")->fetch_all(MYSQLI_ASSOC);

?>
<html>
<head>
    <title>Suvenir Mag Design</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha512-oBTprMeNEKCnqfuqKd6sbvFzmFQtlXS3e0C/RGFV0hD6QzhHV+ODfaQbAlmY6/q0ubbwlAM/nCJjkrgA3waLzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" integrity="sha512-jLmtg/HHup28rUf0sXLUCyrZVMBvp+tp1kEqYJcSQuG26ytM6oEDn08vg7Scn23UnS59x13IijVJMdR8MJTGNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<!-- aici este partea de sus -->
<div class="container">
    <?php include "theme/header.php"; ?>
</div>
<!-- Aici este hederul cu top-uriile -->
<div class="container">
    <?php include "theme/top_vanzari.php";?>
</div><br><br>
<!-- aici afisam ce produse avem in baza de date-->
<div class="container">
    <div class="row">
        <?php
        foreach ($produse as $produs) {
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo url."imagini/produse/".$produs['poza']; ?>" alt="..." style="max-width: 170px;max-height: 170px">
                    <div class="caption">
                        <h3><?php echo $produs['nume']; ?></h3>
                        <p><?php echo $produs['descriere']; ?></p>
                        <p><a href="#"  class="btn btn-primary adaugareCos" data-id="<?php echo $produs['id'];?>" role="button" >Adauga in cos</a>
                            <a href="<?php url;?>detalii_produs.php?id=<?php echo $produs['id']; ?>" class="btn btn-info" role="button" style ="float: right">Detalii</a>
                        </p>
                    </div>
                </div>
            </div>
    <?php } ?>
    </div>
</div>
<script>
    $('.adaugareCos').on('click',function (e) {
        e.preventDefault();
        let idprodus=$(this).data('id');
        $.ajax({
            url:'adauga_in_cos.php?id_produs='+idprodus
        });
        return false;
    })
</script>
</body>
</html>
