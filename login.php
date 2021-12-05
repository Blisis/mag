<?php
require_once "global/db.php";
require_once "global/functii.php";
$database = Database::getInstatnta();
    if(ispost()){

        $erori=[];

        $success = false;

        if (!isvalidemail($_POST['email'], $database)) {
            $erori['invalid_mail'] = "E-mail Invalid";
        }
        $email=$_POST['email'];
        $parola=$_POST['parola'];
        $user = $database->query("SELECT * FROM useri u WHERE u.email = '{$email}'")->fetch_assoc();
        if(md5($parola)===$user["parola"]){
            $_SESSION['user'] =$user;


            $user = $database->query("UPDATE useri u set u.last_login=now() WHERE u.email = '{$email}' ;");
            header('Location:index.php');
        }
    }





?>

<html>
<head>
    <title>Acasa</title>
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
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Autentificare</h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email"name="email" class="form-control">
                        <?php
                        if(isset($erori['invalid_mail'])){
                            echo $erori['invalid_mail'];}
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="">Parola</label>
                        <input type="password"name="parola" class="form-control">
                        <?php
                        if(isset($erori['invalid_parola'])){
                            echo $erori['invalid_parola'];}
                        ?>
                    </div>

                    <div>
                        <input type="submit" class="btn btn-success"value="Log In">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
