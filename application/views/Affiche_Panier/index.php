<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']!='DROITadmin' && !empty($user)) :?>
    <div class="col-lg-6">
    <table class="table-bordered table-responsive table col-lg-6 "style="float: right">
        <caption style="text-align: center"> panier </caption>
        <thead>
        <tr><th>nom</th><th>quantite</th><th>prix</th><th>dateAjout</th><th>operation</th>
        </tr>
        </thead>
        <?php foreach ($paniers as $donnes): ?>
        <tbody>
        <!-- {% for panier in Panierdata if Panierdata is not empty %}-->
        <form method="post" action="<?php echo site_url('commande')?>"">
        <input name="id" type="hidden" value="<?php echo $donnes['id'] ?>"/>
        <tr>
            <td><?php echo $donnes['nom']?></td><td><?php echo $donnes['quantite']?> </td><td><?php echo $donnes['prix']?></td><td><?php echo $donnes['dateAjoutPanier']?> </td>
            <td>  <a href="<?php echo site_url('Affiche_Produit/delete_PanierProduit');?>?id=<?php echo $donnes['id'];?>">删除</a></td>
        </tr><!-- {% endfor %}-->
        <?php endforeach; ?>
        <tbody>
        <<td style="position: absolute">
            <input class="btn btn-success" input type="submit" name="valider" value="valider"/>
    </table>
<?php endif;?>