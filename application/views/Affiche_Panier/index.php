<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']!='DROITadmin' && !empty($user)) :?>
<div align="center">
    <table class="table-bordered table  " style="width: 30%;" >
        <caption style="text-align: center"> panier </caption>
        <thead>
        <tr><th>nom</th><th>quantite</th><th>prix</th><th>dateAjout</th><th>operation</th>
        </tr>
        </thead>
        <?php foreach ($paniers as $donnes): ?>
        <tbody>
        <!-- {% for panier in Panierdata if Panierdata is not empty %}-->
        <form method="post" action="<?php echo site_url('commande/creerCommande')?>"">
        <input name="id" type="hidden" value="<?php echo $donnes['id'] ?>"/>
        <tr>
            <td><?php echo $donnes['nom']?></td><td><?php echo $donnes['quantite']?> </td>
            <td><?php echo $donnes['prix']?></td><td><?php echo $donnes['dateAjoutPanier']?> </td>
            <td>  <a href="<?php echo site_url('Affiche_Produit/delete_PanierProduit');?>?id=<?php echo $donnes['id'];?>">删除</a></td>
        </tr><!-- {% endfor %}-->
        <input name="produit_id" type="hidden" value="<?php echo $donnes['produit_id'] ?>"/>
        <?php endforeach; ?>
        <tbody>
        <tr><th>prix total</th><td><?php echo $prix['prix']?></td></tr>
        <td style="position: absolute">
            <input class="btn btn-success" input type="submit" name="valider" value="valider"/>

    </table>
    <?php endif;?>
</div>