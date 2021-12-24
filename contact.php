<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$email=null;
$erori=[];
$succes=false;


if (islogin()){
    $email=$_SESSION['user']['email'];
    $id_user=$_SESSION['user']['id'];
}
if(ispost()){
    $erori=[];
    $subiect=$_POST['subiect'];
    $mesaj=$_POST['mesaj'];
    if($_POST['subiect']===null){
        $erori['invalid_subiect']="Lipsa Subiect";
    }
    if ($_POST['mesaj']===null){
        $erori['invalid_mesaj']="Lipsa Mesaj";
    }
    if (count($erori)==0){
        $email=$_POST['email'];
        $subiect=$_POST['subiect'];
        $mesaj=$_POST['mesaj'];
        $database->query("insert into mag.`mesaje`(`subiect`,`mesaj`,`email`,`id_user`) values('{$subiect}','{$mesaj}','{$email}','{$id_user}');");
        $succes=true;
    }

    foreach ($erori as $eroare) {
        echo $eroare;
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
                    <h3 class="panel-title">Contacteaza-ne!</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if ($succes==true){

                        echo '<div class="alert alert-success">Am primit solicitarea ta , te vom contacta in cel mai scurt timp posibil!</div>';

                    }

                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email"name="email" class="form-control" value="<?php
                            if ($email!==null){
                                echo $email;
                            } ?>">
                            <?php
                            if(isset($erori['invalid_mail'])){
                                echo $erori['invalid_mail'];}
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Subiect</label>
                            <input type="varchar(255)"name="subiect" class="form-control" value=<?php $subiect?>
                            >

                        </div>
                        <div class="form-group">
                            <label for="">Cum te putem ajuta!</label>
                            <input type="text"name="mesaj" class="form-control" value=<?php $mesaj; ?>>
                        </div>

                        <div>
                            <input type="submit" class="btn btn-success"value="Send">
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>