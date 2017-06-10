
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
<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']!='DROITadmin' && !empty($user)) :?>

<div align="center">
    <table class="table" style="width: 50%;" >
        <caption style="text-align: center"> <h3><?php echo lang('Cart')?></h3> </caption>
        <thead>
        <tr class="biaoti"><th><?php echo lang('name')?></th><th><?php echo lang('amount')?></th><th><?php echo lang('price')?></th><th><?php echo lang('date Added')?></th>
            <th><?php echo lang('operation')?></th>
        </tr>
        </thead>
        <?php foreach ($paniers as $donnes): ?>
        <tbody>
        <!-- {% for panier in Panierdata if Panierdata is not empty %}-->
        <form method="post" action="<?php echo site_url('commande/pay')?>"">
        <input name="id" type="hidden" value="<?php echo $donnes['id'] ?>"/>
        <tr class="shuju">
            <td><?php echo $donnes['nom']?></td><td><a class="btn btn-xs btn-danger" href="<?php echo site_url('Affiche_Produit/deleteProduitPanier');?>?id=<?php echo $donnes['id'];?>">-</a>&nbsp;<?php echo $donnes['quantite']?>&nbsp;<a class="btn btn-xs btn-success" href="<?php echo site_url('Affiche_Produit/ajouterProduitPanier');?>?id=<?php echo $donnes['id'];?>">+</a> </td>
            <td><?php echo $donnes['prix']?></td><td><?php echo $donnes['dateAjoutPanier']?> </td>
            <td><a class="btn btn-xs btn-danger"  href="<?php echo site_url('Affiche_Produit/delete_PanierProduit');?>?id=<?php echo $donnes['id'];?>" style="color: #FFFFFF;"><?php echo lang('Delete')?></a></td>
        </tr><!-- {% endfor %}-->
        <input name="produit_id" type="hidden" value="<?php echo $donnes['produit_id'] ?>"/>
        <?php endforeach; ?>
        <tbody>
        <tr class="biaoti"><th><?php echo lang('price total')?></th><td></td><td></td><td></td><td></td></tr>
        <tr class="shuju"><td><?php echo $prix['prix']?></td></tr>
    </table>
    <div style="margin-top: 30px;">
        <input class="btn btn-success" input type="submit" name="valider" value="<?php echo lang('valider')?>"/>
    </div>
    <?php endif;?>
</div>

<div id="message">

</div>
<div id="jiage">

</div>

<script>
    var tsme=(function () {
        function init() {
            $.get("<?php echo base_url()?>index.php/UniqueLogin/test2", function (data) {
                var d=eval(data);
                $.each(d,function(i,obj){

                    document.getElementById("message").append("<img src='eminem.png' />");
                })



            });
        }
        return init;
    })();

</script>


