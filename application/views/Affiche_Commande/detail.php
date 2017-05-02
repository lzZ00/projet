
<div class="col-lg-6">
    <table style="float: right">
        <caption style="text-align: center"> commande </caption>
        <thead>
        <tr><th>Commandes</th></th><th>prix</th><th>dateAchat</th>
            <th>NomClient</th>
        </tr>
        </thead>
        <?php foreach ($commande as $donnes): ?>
        <tbody>
        <tr>
            <td><?php echo $donnes['nom']?></td><td><?php echo $donnes['prix']?> </td><td><?php echo $donnes['dateAjoutPanier']?></td><td><?php echo $donnes['nomClient']?> </td>
        </tr><!-- {% endfor %}-->
        <?php endforeach; ?>
        <tbody>


    </table>