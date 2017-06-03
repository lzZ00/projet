<style>
    body{ text-align:center}
    .div{ margin:0 auto; width:400px; height:400px; }
    /* css注释：为了观察效果设置宽度 边框 高度等样式 */
    .well {

    }
</style>
</head>


<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 well"> <h1><?php echo $produit['nom']?></h1>
        <h6><?php echo $produit['email']?></h6>
        <h6><?php echo $produit['adresse']?></h6>
        <h6><?php echo $produit['tel']?></h6>
        <h6><a class="btn btn-default btn-md"  href="<?php echo site_url('user/editProfil')?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Modifier l'adresse et tel</a></h6>
        <h6><a class="btn btn-default btn-md" href="<?php echo site_url('user/changerMdp')?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Changer de mot de passe</a></h6></div>
    <div class="col-md-4">  </div>
</div>
