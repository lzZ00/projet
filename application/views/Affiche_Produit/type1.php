
<a href="<?php echo base_url('/index.php/Affiche_Produit/createProduit')?>" class="btn btn-primary">
    Ajouter un Produit
</a>
<br/><br/>
<table class="table table-hover">
    <tr><th>photo</th><th>nom</th><th>prix</th>
        <?php $user = $this->session->userdata('user');?>
        <?php if ( $user['droit']=='DROITadmin') :?>
        <th>operation</th>
        <?php endif;?>
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
        <?php $user = $this->session->userdata('user');?>
        <?php if ( $user['droit']=='DROITadmin') :?>
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
        <?php endif;?>

                </form><br/>
                <?php $user = $this->session->userdata('user');?>
                <?php if ( $user['droit']=='DROITadmin') :?>
                <?php echo form_open('Affiche_Produit/editProduit'); ?>
                <?php echo validation_errors(); ?>
                <input type="submit" value="Modifier" name="Modifier" class="btn btn-warning btn-xs">
                <?php $idM=$donnes['id']; ?>
                <input type="hidden" name="idM" value=<?php echo $idM;?>>
                <?php endif;?>
                </form>
            </td>
        </tr>
        </form>
    <?php endforeach; ?>


</table>
