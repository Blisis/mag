<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
// trebuie sa facem query pe anumit user
// si sa editam anumite date !!!!
$id_user=$_SESSION['user']['id'];
$user=$database->query("select u.id , u.nume , u.telefon , u.adresa , u.email ,u.numar_comenzi, u.vechime
from useri as u where u.id=$id_user;
")->fetch_all(MYSQLI_ASSOC);

?>

<html>
<head>
    <title>Editeaza User</title>
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
   <?php  //informatii despre user
    //trebuie sa facem un tabel din db cu informatiile despre acel user din $_Session
    //sa adaugam un buton de editeaza user si cam atat
?>
   <div class="row" style="background: white">
       <table class="table table-striped  table-sm" border="2">
           <thead class="table-dark">
       <tr>
           <td>Nume</td>
           <td>E-mail</td>
           <td>Telefon</td>
           <td>Adresa</td>
           <td>Numar  comenzi</td>
           <td>Vechime</td>
       </tr>
           <tr>

               <td><?php
                   $user=reset($user);
                   echo $user['nume']?></td>
               <td><?php echo $user['email']?></td>
               <td><?php echo $user['telefon']?></td>
               <td><?php echo $user['adresa']?></td>
               <td><?php echo $user['numar_comenzi']?></td>
               <td><?php echo $user['vechime']?></td>

           </tr>
           </thead>
       </table> <a href="<?php echo url; ?>editeaza_user.php" class="btn btn-warning btn-ml">Editeaza informatiile </a>
   </div>

</div>
</body>
</html>

