
<?php $user = $this->session->userdata('user');?>
<?php if (empty($user)) :?>
    <link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/emptyUser.css"">
<?php else :?>
    <link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/User.css"">
<?php endif;?>
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
                                    <input type="submit" value="Buy" name="Ajouter" class="btn btn-xs">
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