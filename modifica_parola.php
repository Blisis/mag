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
if (ispost()){
    //luam parola user curent din db si verificam daca este aceeasi cu md5(parola curenta)



    // verificam daca noua parola este aceiasi cu confirma parola

    //
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
    <div class="row backgroundAlb" style="padding: 15px">
        <form action="" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <label for="">Parola Curenta</label>
                    <br>
                    <input type="password" class="form-control" name="parola">
                </div>
                <div class="form-group">
                    <br>
                    <label for="">Parola Noua</label>
                    <br>
                    <input type="password" class="form-control parolaNoua" name="parola_noua" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                </div>
                <p class="lungime">parola trebuie sa fie mai lunga de 8 caractere</p>
                <p class="caractereMici">parola trebuie sa contina cel putin un caracter mic</p>
                <p class="mare">
                parola trebuie sa contina cel putin un caracter mare
                </p >
                <p class="cifre">
                parola trebuie sa contina cel putin o cifra
                </p>

                <div class="form-group">
                    <br>
                    <label for="">Confirma Parola Noua</label>
                    <br>
                    <input type="password" class="form-control" name="confirmare_parola" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                </div>
                <input type="submit" class="btn btn-warning" value="Confirma Schimbarea">

            </div>



        </form>




    </div>
</div>
<script>
    const button  = document.querySelector(".parolaNoua");
    button.addEventListener("keyup", parolaNoua);
function parolaNoua(event) {
    let elValue = event.target.value;
    console.log(event.target.value);
    let smallCharactersRegex = /^.*[a-z].*$/;
    let upperCharacterRegex = /^.*[A-Z].*$/;
    let numberCharacterRegex = /^.*[0-9].*$/;

    // verificam daca avem cel putin un caracter mic
    if (smallCharactersRegex.test(elValue) == true){
        changeTextColor('.caractereMici', 'success');
    } else {
        changeTextColor('.caractereMici', 'danger');
    }

    if (upperCharacterRegex.test(elValue) == true) {
        changeTextColor('.mare', 'success');
    } else {
        changeTextColor('.mare', 'danger');
    }

    if (numberCharacterRegex.test(elValue) == true) {
        changeTextColor('.cifre', 'success');
    } else {
        changeTextColor('.cifre', 'danger');
    }

    if (elValue.length >= 8) {
        changeTextColor('.lungime', 'success');
    } else {
        changeTextColor('.lungime', 'danger');
    }
}

function changeTextColor(myClass, type){
    if (type == 'success') {
        $(myClass).removeClass('text-danger');
        $(myClass).addClass('text-success');
    } else {
        $(myClass).removeClass('text-success');
        $(myClass).addClass('text-danger');
    }
}

</script>
</body>
</html>

