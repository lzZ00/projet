<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/Detail1.css"">
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-sm-6 D">
            <div class="photo">
                <p> <?php   echo $product['nom']; ?></p>

                <?php
                echo"<img src='../../../assets/img/".$product['photo']."' img-rounded height='200' class='img-rounded'/>";
                ?>

                <p class="xiangqing"><?php   echo $product['xiangqing']; ?></p>

            </div>
        </div>
        <div class="col-sm-3 D">

            <div class="prix">
                <p>  <?php   echo lang('price'); ?> :<?php   echo $product['prix']; ?></p>

                <p> <?php   echo lang('dispo')?> :<?php   echo $product['dispo']; ?></p>



                <?php echo form_open('Affiche_Produit/addProduit'); ?>
                <?php echo validation_errors(); ?>
                <select name="quantite" class="select" id="quantite">
                    <?php for($i=1;$i<=$product['dispo'];$i++){ ?>
                        <option value="<?php  echo $i ; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <br>
                <input type="submit" value="Buy" name="Ajouter1" class="btn btn-primary btn-lg buyy" id="<?php echo $rowid;?>" >
                <?php $idA=$rowid; ?>
                <input type="hidden" name="idA"  id="idA" value=<?php echo $idA;?> >
                <?php $dispo=$product['dispo']; ?>
                <input type="hidden" name="dispo" id="dispo" value=<?php echo $dispo;?>>
                </tr>
            </div>
        </div>
    </div>
</div>