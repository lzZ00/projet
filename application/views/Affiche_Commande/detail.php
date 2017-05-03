
<div class="col-lg-6">
    <table class="table table-condensed">
        <caption style="text-align: center"> commande </caption>
        <thead>
        <tr><th>Commandes</th></th><th>prix</th><th>quantite</th><th>dateAchat</th>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin') :?>
            <th>NomClient</th>
            <?php endif;?>
        </tr>
        </thead>
        <?php foreach ($commande as $donnes): ?>
        <tbody>
        <tr>
            <td><?php echo $donnes['nom']?></td><td><?php echo $donnes['prix']?> </td><td><?php echo $donnes['quantite']?> </td>
            <td><?php echo $donnes['dateAjoutPanier']?></td>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin') :?>
            <td><?php echo $donnes['nomClient']?> </td>
            <?php endif;?>
        </tr><!-- {% endfor %}-->
        <?php endforeach; ?>
        <tbody>


    </table>