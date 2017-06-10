
<?php $user = $this->session->userdata('user');?>
<?php if (empty($user)) :?>
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/emptyUser.css"">
    <?php else :?>
    <link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/User1.css"">

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/login.js"></script>

<?php endif;?>



<!--       用户的页面   -->
<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']!='DROITadmin'):?>
    <div class="container" align="center">


    <?php foreach ($produits as $donnes): ?>
        <div class="col-sm-4">
            <a href="<?php echo base_url()?>index.php/Affiche_Produit/getProduit/<?php echo $donnes['id']?>">
                <div class="speical speical-default speical-radius" >

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
            </a>
            <br/>
            <?php $user = $this->session->userdata('user');?>
            <?php if ( $user['droit']!='DROITadmin' && !empty($user)) :?>
                <td>
                    <?php echo form_open('Affiche_Produit/addProduit'); ?>
                    <?php echo validation_errors(); ?>
                    <select name="quantite" class="form-control" id="quantite<?php echo $donnes['id'];?>" style="width: 50%">
                        <?php for($i=1;$i<=$donnes['dispo'];$i++){ ?>
                            <option value="<?php  echo $i ; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <input type="button" value="Ajouter" name="Ajouter" class="btn btn-xs" id="<?php echo $donnes['id'];?>" onclick="add_produit(this.id)" >
                    <?php $idA=$donnes['id']; ?>
                    <input type="hidden" name="idA"  id="idA" value=<?php echo $idA;?> >
                    <?php $dispo=$donnes['dispo']; ?>
                    <input type="hidden" name="dispo" id="dispo<?php echo $donnes['id'];?>" value=<?php echo $dispo;?>>
                </td>
                </tr>
                </form>
                </td>
            <?php endif;?>
        </div>
        </div>

        </div>
    <?php endforeach; ?>


    <?php echo $this->pagination->create_links(); ?>

<?php endif;?>

<span id="shopping-cart"><i class="fa fa-shopping-cart"></i></span>
<!--        admin 的页面   -->
<?php $user = $this->session->userdata('user');?>
<?php if ( $user['droit']=='DROITadmin'):?>
    <div align="center">
        <a href="<?php echo base_url('/index.php/Affiche_Produit/createProduit')?>" class="btn btn-primary">
            Add a product
        </a>
        <table class="table table-bordered" style="width: 30%;" >
            <tr><th>photo</th><th>name</th><th>price</th>
                <?php $user = $this->session->userdata('user');?>
                <?php if ( $user['droit']=='DROITadmin' || !empty($user)) :?>
                    <th>available</th>
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
                <td><a href="<?php echo base_url()?>index.php/Affiche_Produit/edit_photo/<?php echo $donnes['id']?>"><img src="<?php echo base_url()?>assets/img/<?php echo $donnes['photo']?>" width="50" alt="photo"/></a></td>
                <td><?php echo $donnes['nom']?> </td>
                <td><?php echo $donnes['prix']?></td>
                    <td><?php echo $donnes['dispo']?></td>
                    <td><?php echo $donnes['stock']?></td>
                    <td>
                        <?php echo form_open('Affiche_Produit'); ?>
                        <?php echo validation_errors(); ?>
                        <?php $idS=$donnes['id']; ?>
                        <a href="#" type="button" data-toggle="modal" data-target="#supprimerm<?php echo $idS;?>"class="btn btn-danger btn-xs" >Delete</a>
                        <input type="hidden" name="idS" value=<?php echo $idS;?>>
                        <!-- 删除确认的弹窗-->
                        <div class="modal fade" id="supprimerm<?php echo $idS;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">删除确认<?php echo  $donnes['nom'];?></h4>
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
                        <input type="submit" value="Edit" name="Modifier" class="btn btn-warning btn-xs">
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




<div id="div1"><?php echo lang('bytes');?></div>
<script>
    //var rowid=document.getElementById("idA").value;
   /* var quantite=document.getElementById("quantite").value;
    var dispo=document.getElementById("dispo").value;*/
    function add_produit(rowid){
        document.getElementById("div1").innerHTML=rowid;
        var quantite=document.getElementById("quantite"+rowid).value;
        var dispo=document.getElementById("dispo"+rowid).value;
        $.ajax({
            url: "../index.php/Affiche_Produit/add_Produit_ajax/" + rowid + "/" + quantite + "/" + dispo, success: function (result) {
            }
        });
    }
</script>