


<div class="row backgroundAlb container col-md-10 align-middle">
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Top Vanzari</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Top cautari</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Nou</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row">
                    <?php
                    foreach ($vanzari as $vanzare) { ?>

                        <div class="col-md-3">
                            <a href="<?php url;?>detalii_produs.php?id=<?php echo $vanzare['id']; ?>">
                            <img  src="<?php echo url.'imagini/produse/'.$vanzare['poza']; ?>" alt=""class="img-rounded img-responsive">
                            </a>
                        </div>

                    <?php } ?>

                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="row">
                    <?php
                    foreach ($cautari as $cautare) { ?>

                        <div class="col-md-3">
                            <a href="<?php url;?>detalii_produs.php?id=<?php echo $cautare ['id']; ?>">
                        <img src="<?php echo url.'imagini/produse/'.$cautare['poza']; ?>" alt=""class="img-rounded img-responsive">
                            </a>
                        </div>

                    <?php } ?>

                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
                <div class="row">
                    <?php
                    foreach ($noutati as $nou) { ?>

                        <div class="col-md-3">
                            <a href="<?php url;?>detalii_produs.php?id=<?php echo $nou['id']; ?>">
                                <img src="<?php echo url.'imagini/produse/'.$nou['poza']; ?>" alt=""class="img-rounded img-responsive">
                            </a>
                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>
    </div>
</div>
<br>
<br>
