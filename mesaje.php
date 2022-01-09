<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$user=$_SESSION["user"];
$subiecte=$database->query("select  * from subiecte_mesaje where id_user={$user['id']}")->fetch_all(MYSQLI_ASSOC);
//echo "<pre>";
//var_dump($subiecte);
//die();





?>
<html>
<head>
    <title>Suvenir Mag Design-Mesaje</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha512-oBTprMeNEKCnqfuqKd6sbvFzmFQtlXS3e0C/RGFV0hD6QzhHV+ODfaQbAlmY6/q0ubbwlAM/nCJjkrgA3waLzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" integrity="sha512-jLmtg/HHup28rUf0sXLUCyrZVMBvp+tp1kEqYJcSQuG26ytM6oEDn08vg7Scn23UnS59x13IijVJMdR8MJTGNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<!-- aici este Header  -->
<div class="container">
    <?php include "theme/header.php"; ?>
</div>
<section class="content">
    <div class=" col-md-12">
    <div class="container-fluid" >
        <!-- Small boxes (Stat box) -->
        <table class="table table-striped  table-sm">
            <thed>
                <td>Data</td>
                <td>Subeiect</td>
                <td>Status</td>
                <td style ="float: right">Vizualizeaza</td>
            </thed>

            <?php foreach ($subiecte as $subiect){?>
            <tbody>
                <td><?php echo $subiect['data']; ?></td>
                <td><?php echo $subiect['subiect']; ?></td>
                <td><?php
                if ($subiect['status']==0){
                    ?>
                    <div class="Mesaj trimis" style="color: green">Mesaj trimis</div>
                    <?php
                }else if($subiect['status']==1){
                    ?>
                    <div class="Mesaj trimis" style="color: Blue">Iti cautam un raspuns</div>
                    <?php
                } else{
                    ?>
                    <div class="Mesaj trimis" style="color: red">Am gasit solutia</div>
                    <?php
                }



                ?></td>
                <td><a href="<?php url;?>conversatie.php?id=<?php echo $subiect['id']; ?>" class="btn btn-info" role="button" style ="float: right">Vizualizeaza mesaje</a></td>
                <br>
            </tbody>
<?php }?>

        </table>
    </div>
    </div>
</section>
</body>
</html>
