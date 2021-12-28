<?php
$nrMesaje_noi=$database->query("select count(m.id) as n from mesaje as m where status='0'")->fetch_all(MYSQLI_ASSOC);
$nrMesaje_noi=reset($nrMesaje_noi);
$nrComenzi_primite=$database->query("select count(c.id) as n from comenzi as c where status='primita'")->fetch_all(MYSQLI_ASSOC);
$nrComenzi_primite=reset($nrComenzi_primite);
$comenzi_primite=$database->query("select c.id as n from comenzi as c where status='primita'")->fetch_all(MYSQLI_ASSOC);
$comenzi_primite=reset($comenzi_primite);



$mesage=$database->query("select  m.id,m.subiect,m.data,m.status,u.nume,u.email from mesaje as m
join useri as u
where u.id=m.id_user && m.status=0 order by m.data desc
;")->fetch_all(MYSQLI_ASSOC);
//var_dump($mesaje);
//die();
?>


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo url;?>admin/dashbord.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->


        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge"><?php echo $nrMesaje_noi['n'] ;?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php
            foreach( $mesage as $mesaj){
            ?>
                <a href="<?php url?>/admin/raspunde_mesaj.php" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title"><?php
                                if ($mesaj['nume']!=null) {
                                    echo $mesaj['nume'];
                                } echo $mesaj['email'];
                                ?></h3>

                            <p class="text-sm"><?php echo $mesaj['subiect']; ?></p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo $mesaj['data']; ?></p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <?php };
            ?>




                <!--
                 Messages Dropdown Menu
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">10</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
-----------------------------------------------------------------Message Start
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
---------------------------------------------------------------------------Message End

                <div class="dropdown-divider"></div>
-----------------------------------------------------------------------------Message Start
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
---------------------------------------------------------------------------Message End
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
------------------------------------------------------------Message End
                <div class="dropdown-divider"></div>
                <a href="../admin/mesaje.php" class="dropdown-item dropdown-footer">Afiseaza totate mesajele!</a>
            </div>
        </li>


                -->

                <div class="dropdown-divider"></div>
                <a href="<?php url?>admin/mesaje.php" class="dropdown-item dropdown-footer">Afiseaza totate mesajele!</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"><?php echo $comenzi_primite['n'] ;?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?php echo $comenzi_primite['n'] ;?> Comenzi noi</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php url?>admin/comenzi/listeaza_nou.php class="dropdown-item dropdown-footer">Afisaza toate COMENZIILE!</a>
            </div>
        </li>
    </ul>
</nav>