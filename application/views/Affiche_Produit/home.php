<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']=='DROITadmin'):?>
    <a href="<?php echo base_url('/index.php/Affiche_Produit/createProduit')?>" class="btn btn-primary">
        Ajouter un Produit
    </a>
<?php endif;?>
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/test.css"">
<br/><br/>

<div align="center">
    <table class="table table-bordered" style="width: 30%;" >
        <tr><th>photo</th><th>nom</th><th>prix</th>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' || !empty($user)) :?>
                <th>dispo</th>
            <?php endif;?>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' ):?>
                <th>stock</th>
            <?php endif;?>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' || !empty($user)) :?>
                <th>operation</th>
            <?php endif;?>
        </tr>
        </thead>
        <?php foreach ($produits as $donnes): ?>
            <tr>
            <td><img src="<?php echo base_url()?>assets/img/<?php echo $donnes['photo']?>" width="50" alt="photo"/></td>
            <td><?php echo $donnes['nom']?> </td>
            <td><?php echo $donnes['prix']?></td>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' || !empty($user)) :?>
                <td><?php echo $donnes['dispo']?></td>
            <?php endif;?>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' ):?>
                <td><?php echo $donnes['stock']?></td>
            <?php endif;?>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' && !empty($user)) :?>
                <td>
                    <?php echo form_open('Affiche_Produit'); ?>
                    <?php echo validation_errors(); ?>
                    <?php $idS=$donnes['id']; ?>
                    <a href="#" type="button" data-toggle="modal" data-target="#supprimerm<?php echo $idS;?>"class="btn btn-danger btn-xs" >删除</a>
                    <input type="hidden" name="idS" value=<?php echo $idS;?>>
                    <!-- 删除确认的弹窗-->
                    <div class="modal fade" id="supprimerm<?php echo $idS;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">删除确认<?php echo $idS;?></h4>
                                </div>
                                <div class="modal-body">
                                    <p>确定要删除吗？</p>
                                    <button type="submit" class="btn btn-danger"value="Supprimer" name="Supprimer" >确定</button>
                                    <input type="hidden" name="idS" value=<?php echo $idS;?>>
                                    <button type="submit" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >取消</button>
                                    </br>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <br/>
                    <?php echo form_open('Affiche_Produit/editProduit'); ?>
                    <?php echo validation_errors(); ?>
                    <input type="submit" value="Modifier" name="Modifier" class="btn btn-warning btn-xs">
                    <?php $idM=$donnes['id']; ?>
                    <input type="hidden" name="idM" value=<?php echo $idM;?>>
                    </form>
                </td>
            <?php endif;?>
            <br/>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']!='DROITadmin' && !empty($user)) :?>
                <td>
                    <?php echo form_open('Affiche_Produit/addProduit'); ?>
                    <?php echo validation_errors(); ?>
                    <select name="quantite" class="form-control" style="width: 50%">
                        <?php for($i=1;$i<=$donnes['dispo'];$i++){ ?>
                            <option value="<?php  echo $i ; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="Ajouter" name="Ajouter" class="btn btn-xs">
                    <?php $idA=$donnes['id']; ?>
                    <input type="hidden" name="idA" value=<?php echo $idA;?>>
                    <?php $dispo=$donnes['dispo']; ?>
                    <input type="hidden" name="dispo" value=<?php echo $dispo;?>>
                </td>
                </tr>
                </form>
                </td>
            <?php endif;?>
        <?php endforeach; ?>

    </table>
    <?php echo $this->pagination->create_links(); ?>
</div>

<br/><br/><br/><br/>
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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
