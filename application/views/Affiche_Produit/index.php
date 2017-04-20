<a href="<?php echo base_url('/index.php/Affiche_Produit/createProduit')?>" class="btn btn-primary">
   Ajouter un Produit
</a>
<br/><br/>
<table class="table table-hover" style="width: 30%;float:left" >
    <tr><th>photo</th><th>nom</th><th>prix</th><th>operation</th>
    </tr>
    </thead>
<?php foreach ($produits as $donnes): ?>
    <tr>
    <td><img src="<?php echo base_url()?>assets/img/<?php echo $donnes['photo']?>" width="50" alt="photo"/></td>
    <td><?php echo $donnes['nom']?> </td>
    <td><?php echo $donnes['prix']?></td>
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
            <br/>
            <?php echo form_open('Affiche_Produit/addProduit'); ?>
            <?php echo validation_errors(); ?>
            <input type="submit" value="Ajouter" name="Ajouter" class="btn btn-xs">
            <?php $idA=$donnes['id']; ?>
            <input type="hidden" name="idA" value=<?php echo $idA;?>>
        </td>
        </tr>
    </form>
<?php endforeach; ?>
</table>
<div class="col-lg-6">
    <table class="table-bordered table-responsive table col-lg-6 "style="float: right">
        <caption style="text-align: center"> panier </caption>
        <thead>
        <tr><th>nom</th><th>quantite</th><th>prix</th><th>dateAjout</th><th>operation</th>
        </tr>
        </thead>
        <?php foreach ($paniers as $donnes): ?>
        <tbody>
        <!-- {% for panier in Panierdata if Panierdata is not empty %}-->
         <form method="post" action="">
             <input name="id" type="hidden" value=""/>
             <tr>
                 <td><?php echo $donnes['nom']?> </td><td><?php echo $donnes['quantite']?> </td><td><?php echo $donnes['prix']?></td><td><?php echo $donnes['dateAjoutPanier']?> </td>
                 <td>  <a href="<?php echo site_url('Affiche_Produit/delete_PanierProduit');?>?id=<?php echo $donnes['id'];?>">删除</a></td>
             </tr>
             <!-- {% endfor %}-->
         <tbody>
        <?php endforeach; ?>
     </table>

