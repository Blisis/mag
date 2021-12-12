<?php $categorii=$database->query("
select * from categorii
")->fetch_all(MYSQLI_ASSOC);



?>
<div class="row backgroundAlb">
    <div class="col-md-6">
        <img src="<?php echo url; ?>imagini/design/original.png" alt="" class="logo">
    </div>
    <div class="col-md-3">
        <form action="" class="cautare">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                    </span>
            </div>
        </form>
    </div>
    <div class="col-md-3">
        <?php if (islogin()) {//aici esti logat?>
            <div class="authbox">
                Bine ai venit,
                <?php
                if ($_SESSION['user']['nume']!==null){
                    echo $_SESSION['user']['nume'];
                } else{
                    echo $_SESSION['user']['email'];
                }
                ?>
                <br>
                <a href="<?php echo url; ?>logout.php" class="btn btn-danger btn-xs">Paraseste</a>
                <a href="<?php echo url; ?>user.php" class="btn btn-danger btn-xs">Contul meu</a>
                <a href="<?php echo url; ?>cos.php" class="btn btn-danger btn-xs">Cosul meu</a>
                <?php
                if ($_SESSION['user']['is_admin']==1){
                    ?>
                <a href="admin/dashbord.php" class="btn btn-danger btn-xs">Panou Control</a>
                   <?php
                }
                ?>
            </div>
        <?php } else { //aici nu esti logat?>
            <div class="autentificareHeader" >
                <a href="login.php" class="btn btn-danger">Autentifica-te</a>
                <a href="signin.php" class="btn btn-danger">Inregistrare</a>
            </div>
        <?php } ?>
    </div>
</div>
<!--divul pentru categorii    -->
<div class="row">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Acasa<span class="sr-only">(current)</span></a></li>
<!--      aici sa fac legaturiile cu linkuriile              -->
                    <?php

                    foreach ($categorii as $categorie){
                    if ($categorie['id_parinte']==0){?>
                    <li><a href="<?php echo url;?>categorie_selectata.php?id=<?php echo $categorie['id']; ?>"><?php echo $categorie['nume']?></a></li>
                        <?php
                    }}?>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--divul pentru categorii    -->
<div class="row">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--  aici sa fac legaturiile cu linkuriile pentru categorii
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php

                    foreach ($categorii as $categorie){
                      if ($categorie['id_parinte']==1){
                        ?>

                        <li><a href="<?php echo url;?>categorie_selectata.php?id=<?php echo $categorie['id']; ?>"><?php echo $categorie['nume']?></a></li>
                        <?php
                      }}?>
                      -->
                </ul>
            </div>
        </div>
    </nav>
</div>