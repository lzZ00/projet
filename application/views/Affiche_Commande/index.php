
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
    <table class="table" style="width: 30%">
        <caption style="text-align: center"> <?php echo lang('Orders')?> </caption>
        <thead>
        <tr class="biaoti">   <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin') :?>
            <th>Order</th>
            <?php endif;?></th><th><?php echo lang('price')?></th><th><?php echo lang('date Added')?></th><th><?php echo lang('state')?></th>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin') :?>
            <th>Operation</th>
            <?php endif;?>
            <th><?php echo lang('Detail')?></th>

        </tr>
        </thead>
        <?php foreach ($commande as $donnes): ?>
        <tbody>
        <form method="post" action="<?php echo site_url('Affiche_Produit')?>"">
        <input name="id" type="hidden" value="<?php echo $donnes['id'] ?>"/>
        <tr class="shuju">
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin') :?>
            <td><?php echo $donnes['id']?></td>
            <?php endif;?>
            <td><?php echo $donnes['prix']?> </td>
            <td><?php echo $donnes['date_achat']?></td>
            <td><?php echo $donnes['libelle']?> </td>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin') :?><td>  <a href="<?php echo site_url('commande/valideCommande');?>?id=<?php echo $donnes['id'];?>"><?php echo lang('confirm')?></a></td><?php endif;?>
            <td>  <a href="<?php echo site_url('commande/detail');?>?id=<?php echo $donnes['id'];?>"><?php echo lang('see')?></a></td>
        </tr><!-- {% endfor %}-->
        <?php endforeach; ?>
        </tbody>
    </table>
</div>