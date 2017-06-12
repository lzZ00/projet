
<style type="text/css">//
    th{
        width: 100px;
    }
    .biaoti{
        background-color: #009FCC;
        height: 40px;
        color: #FFFFFF;
    }
    .biaoti th{
        text-align: center;
    }
    .shuju{
        height: 40px;
        text-align: center;
    }
    .biaoti th:hover{
        background-color: #00DDDD;
    }
</style>
<div align="center">
    <table class="table" style="width: 50%">
        <caption style="text-align: center" > commande </caption>
        <thead>
        <tr class="biaoti"><th>Commandes</th></th><th>prix</th><th>quantite</th><th>dateAchat</th>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin') :?>
            <th>NomClient</th>
            <?php endif;?>
        </tr>
        </thead>
        <?php foreach ($commande as $donnes): ?>
        <tbody>
        <tr class="shuju">
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
    </div>


