<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$id_user=$_SESSION['user']['id'];
if (isset($_GET['stergeprodus'])){
    $stergeprodus=$_GET['stergeprodus'];
    $database->query("delete c.* from cos as c where c.id={$stergeprodus} and c.id_user={$id_user}");
}
$produse_cos=$database->query("select c.*, p.nume, p.pret
from cos as c join produse as p on c.id_produs = p.id
where c.id_user = {$id_user};")->fetch_all(MYSQLI_ASSOC);
//echo "<pre>";
//var_dump($produse_cos,$id_user);



?>
<html>
<head>
    <title>Cos de cumparaturi</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha512-oBTprMeNEKCnqfuqKd6sbvFzmFQtlXS3e0C/RGFV0hD6QzhHV+ODfaQbAlmY6/q0ubbwlAM/nCJjkrgA3waLzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" integrity="sha512-jLmtg/HHup28rUf0sXLUCyrZVMBvp+tp1kEqYJcSQuG26ytM6oEDn08vg7Scn23UnS59x13IijVJMdR8MJTGNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container">
    <?php include "theme/header.php"; ?>
    <div class="row backgroundAlb">
        <div>
            <?PHP
            if(count($produse_cos)==0){
                echo "Nu exista nimic in cos!";
            }
            else{?>
                 <table class="table table-striped  table-sm" border="2">
                        <thead class="table-dark">
                        <td>Nume Produs</td>
                        <td>Cantitatea</td>
                        <td>Pret per bucata</td>
                        <td>Pret total</td>
                        <td> </td>
                        </thead>
                    <?php
                    foreach ($produse_cos as $produs) { ?>
                     <tr>
                         <td>
                         <?php
                         echo $produs['nume'];
                         ?></td>
                         <td><?php
                             echo $produs['cantitate'];
                             ?>
                         </td>
                         <td>
                             <?php
                             echo $produs['pret'];
                             ?>
                         </td>
                         <td><?php
                             echo $produs['cantitate']*$produs['pret'];

                             ?></td>
                         <td>
                             <a href="cos.php?stergeprodus=<?php echo $produs['id'] ?>" class="btn btn-danger">Sterge</a>
                         </td>

                      </tr>
                     <?php

                  // aici inchidem foreach
                  }
                     ?>
                 </table>
           <?php
           // aici inchidem else
            }
            ?>





        </div>
    </div>
</div>
</body>
</html>
