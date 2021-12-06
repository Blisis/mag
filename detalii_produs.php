<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$id=$_GET['id'];
$produs=$database->query("
select * from produse where id={$id}; 
")->fetch_all(MYSQLI_ASSOC);
$produs=reset($produs);
//var_dump($produs);
//die();
/*array(11) {
["id"]=> string(1) "4"
ok["nume"]=> string(8) "laptop 2"
ok["descriere"]=> string(15) "asdfasdfhfgjdgj"
["pret"]=> string(5) "12.00"
nu["stoc"]=> string(1) "1"
["poza"]=> string(22) "1635018567_38083_2.png"
ok["greutate"]=> string(5) "12.00"
ok["lungime"]=> string(5) "12.00"
ok["latime"]=> string(5) "12.00"
nu["id_categorie"]=> string(1) "1"
["data"]=> string(19) "2021-12-02 19:50:25" }



*/
?>
<html>
<head>
    <title><?php echo $produs['nume']; ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha512-oBTprMeNEKCnqfuqKd6sbvFzmFQtlXS3e0C/RGFV0hD6QzhHV+ODfaQbAlmY6/q0ubbwlAM/nCJjkrgA3waLzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" integrity="sha512-jLmtg/HHup28rUf0sXLUCyrZVMBvp+tp1kEqYJcSQuG26ytM6oEDn08vg7Scn23UnS59x13IijVJMdR8MJTGNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<body>
<div class="container">
    <?php include "theme/header.php"; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $produs['nume']; ?></h1>
        </div>
        <div class="col-md-3">

<img src="<?php url?>imagini/produse/<?php echo$produs['poza'] ?>" class="img-responsive"  style="">
        </div>

        <div class="col-md-9">
            <div class="col-md-3">
                Descriere:
            </div>
            <div class="col-md-9">
            <?php echo $produs['descriere']; ?>
            </div>
            <div class="col-md-3">
                Greutate:
            </div>
            <div class="col-md-9">
            <?php echo $produs['greutate']; ?>
            </div>
            <div class="col-md-3">
                Lungime:
            </div>
            <div class="col-md-9">
                <?php echo $produs['lungime']; ?>
            </div>
            <div class="col-md-3">
                Latime:
            </div>
            <div class="col-md-9">
                <?php echo $produs['latime']; ?>
            </div>
            <div class="col-md-3">
                A fost adaugat pe :
            </div>
            <div class="col-md-9">
                <?php echo $produs['data']; ?>
            </div>
            <div class="col-md-3">
               Pret :
            </div>
            <div class="col-md-9">
                <?php echo $produs['pret']; ?>
            </div>








        <br>
        <a href="index.php" class="btn btn-info" role="button">Inapoi</a>
        <p><a href="#"  class="btn btn-primary adaugareCos" data-id="<?php echo $produs['id'];?>" role="button" >Adauga in cos</a>
        </div>



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