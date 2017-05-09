
<div class="col-lg-6">
    <table class="table">
        <caption style="text-align: center"> commande </caption>
        <thead>
        <tr><th>Commandes</th></th><th>prix</th><th>dateAchat</th><th>Etat</th>
            <th>Operation</th> <th>Detail</th>

        </tr>
        </thead>
        <?php foreach ($commande as $donnes): ?>
        <tbody>
        <form method="post" action="<?php echo site_url('Affiche_Produit')?>"">
        <input name="id" type="hidden" value="<?php echo $donnes['id'] ?>"/>
        <tr>
            <td><?php echo $donnes['id']?></td><td><?php echo $donnes['prix']?> </td><td><?php echo $donnes['date_achat']?></td><td><?php echo $donnes['libelle']?> </td>
            <td>  <a href="<?php echo site_url('commande/valideCommande');?>?id=<?php echo $donnes['id'];?>">valider</a></td>
            <td>  <a href="<?php echo site_url('commande/detail');?>?id=<?php echo $donnes['id'];?>">voir</a></td>
        </tr><!-- {% endfor %}-->
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>