
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/User1.css"">



<div class="container" align="center">

        <?php foreach ($produits as $donnes): ?>
        <div class="col-sm-4" >
            <div class="speical speical-default speical-radius">
           <!--     <div class="shape">
                    <div class="shape-text">
                    </div>
                </div>-->
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
                    <p>
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
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

