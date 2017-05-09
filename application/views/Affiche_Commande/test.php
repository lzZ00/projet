<div class="col-lg-6">
    <table class="table-bordered table-responsive table col-lg-6 ">
        <caption style="text-align: center"> panier </caption>
        <thead>
        <tr><th>produit_id</th>
        </tr>
        </thead>
        <?php foreach ($test as $donnes): ?>
        <tbody>
        <!-- {% for panier in Panierdata if Panierdata is not empty %}-->
        <form method="post" action="<?php echo site_url('commande/creerCommande')?>"">
        <tr>
            <td><?php echo $donnes['produit_id']?></td>

        </tr><!-- {% endfor %}-->
        <?php endforeach; ?>
        <tbody>
    </table>

</div>