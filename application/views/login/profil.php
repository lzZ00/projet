

<div class="col-lg-3 well" >
    <div class="col-lg-6" >
        <div class="col-md-12" >
            <h1><?php echo $produit['nom']?></h1>
            <h6><?php echo $produit['email']?></h6>
            <h6><?php echo $produit['adresse']?></h6>
            <h6><?php echo $produit['tel']?></h6>
            <h6><a href="<?php echo site_url('user/editProfil')?>">Modifier l'adresse et tel</a></h6>
            <h6><a href="<?php echo site_url('user/changerMdp')?>">Changer de mot de passe</a></h6>
        </div>
    </div>
</div>

