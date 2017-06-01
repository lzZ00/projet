<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']=='DROITadmin'):?>
<a href="<?php echo base_url('/index.php/Affiche_Produit/createProduit')?>" class="btn btn-primary">
   Ajouter un Produit
</a>
<?php endif;?>
<?php $user = $this->session->userdata('user');?>
<?php if (empty($user)) :?>
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/emptyUser.css"">
    <?php else :?>
    <link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/User.css"">
<?php endif;?>

<!--       用户的页面   -->
<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']!='DROITadmin'):?>
<div class="container" align="center">
<div class="row">
        <?php foreach ($produits as $donnes): ?>
    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-3" style="width: 30%">
        <div class="speical speical-default speical-radius">
            <div class="speical-content">
                <h3 class="text-special-default">
                    <?php echo $donnes['nom']?>
                </h3>
                <p>
                    <img src="<?php echo base_url()?>assets/img/<?php echo $donnes['photo']?>" width="50px" height="50px"  alt="photo" class="img-responsive img-rounded"/>
                </p>
                <p>
                    prix: <?php echo $donnes['prix']?>
                </p>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' || !empty($user)) :?>
                <p>dispo: <?php echo $donnes['dispo']?></p>
            <?php endif;?>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']=='DROITadmin' ):?>
                <p>stock:<?php echo $donnes['stock']?></p>
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
        </div>
    </div>
</div>
            <?php endforeach; ?>
</div>
<?php echo $this->pagination->create_links(); ?>
</div>
<?php endif;?>
<!--        admin 的页面   -->
<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']=='DROITadmin'):?>
    <div align="center">
        <a href="<?php echo base_url('/index.php/Affiche_Produit/createProduit')?>" class="btn btn-primary">
            Ajouter un Produit
        </a>
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
                    <td><?php echo $donnes['dispo']?></td>
                    <td><?php echo $donnes['stock']?></td>
                    <td>
                        <?php echo form_open('Affiche_Produit'); ?>
                        <?php echo validation_errors(); ?>
                        <?php $idS=$donnes['id']; ?>
                        <a href="#" type="button" data-toggle="modal" data-target="#supprimerm<?php echo $idS;?>"class="btn btn-danger btn-xs" >Supprimer</a>
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
                <br/>
            <?php endforeach; ?>
        </table>
        <?php echo $this->pagination->create_links(); ?>
    </div>
<?php endif;?>



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
                 <td><?php echo $donnes['nom']?></td><td><a class="btn btn-xs btn-danger" href="<?php echo site_url('Affiche_Produit/deleteProduitPanier');?>?id=<?php echo $donnes['id'];?>">-</a>&nbsp;<?php echo $donnes['quantite']?>&nbsp;<a class="btn btn-xs btn-success" href="<?php echo site_url('Affiche_Produit/ajouterProduitPanier');?>?id=<?php echo $donnes['id'];?>">+</a> </td>
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
