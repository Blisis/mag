<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
// trebuie sa facem query pe anumit user
// si sa editam anumite date !!!!
$id_user=$_SESSION['user']['id'];
$user=$database->query("select u.id , u.nume , u.telefon , u.adresa , u.email 
from useri as u where u.id=$id_user;
")->fetch_all(MYSQLI_ASSOC);
if (ispost()){
    //validam datele
    //formatul de email
    //formatul de nume
    //formatul de telefon
    // adresa contine ceva

    // dupa validare( count de erori = 0) facem update in db
}

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
    <div class="row backgroundAlb">
        <table class="table table-striped  table-sm" border="2">
            <thead class="table-dark ">
                <tr>
                    <td>Nume</td>
                    <td>E-mail</td>
                    <td>Telefon</td>
                    <td>Adresa</td>
                    <td>
                        <a href="modifica_parola.php" class="btn btn-danger btn-sm">Modifica PAROLA</a>
                    </td>
                </tr>
            </thead>
            <tr class="table-dark ">
                <form action="">
            <td>

                    <div class="form-group" >
                        <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $_SESSION['user']['nume'];  ?>">
                    </div>

            </td>
            <td>

                    <div class="form-group" >
                        <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $_SESSION['user']['email'];  ?>">
                    </div>

            </td>
            <td>

                    <div class="form-group" >
                        <input type="text" name="telefon" class="form-control" placeholder="Telefon" value="<?php echo $_SESSION['user']['telefon'];  ?>">
                    </div>

            </td>
            <td>

                    <div class="form-group" >
                        <input type="text" name="adresa" class="form-control" placeholder="Adresa"value="<?php echo $_SESSION['user']['adresa'];  ?>">
                    </div>

            </td>
            <td>
                <button class="btn btn-warning btn-sm"> Actualizeaza informatiile</button>
            </td>
                </form>
            </tr>
        </table>
    </div>
</div>



</body>
</html>
