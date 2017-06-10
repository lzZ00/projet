<div class="col-md-10 col-md-offset-1">
    <h4 align="center"></h4>

    <font size="20" color="#00008b"> <?php   echo $product['nom']; ?></font>
    <br/>
    <font size="20" color="#00008b"> <?php   echo $product['prix']; ?></font>
    <br/>
   <font size="20" color="#00008b"> Stock : <?php   echo $product['dispo']; ?></font>

    </br>
    </br>
    <?php

        echo"<img src='../../../assets/img/".$product['photo']."' img-rounded height='200' class='img-rounded'/>";

    ?>

    </br>

    </tr>
    <?php echo form_open('Affiche_Produit/addProduit'); ?>
    <?php echo validation_errors(); ?>
    <select name="quantite" class="form-control" id="quantite" style="width: 50%">
        <?php for($i=1;$i<=$product['dispo'];$i++){ ?>
            <option value="<?php  echo $i ; ?>"><?php echo $i; ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Buy" name="Ajouter1" class="btn btn-xs" id="<?php echo $rowid;?>" >
    <?php $idA=$rowid; ?>
    <input type="hidden" name="idA"  id="idA" value=<?php echo $idA;?> >
    <?php $dispo=$product['dispo']; ?>
    <input type="hidden" name="dispo" id="dispo" value=<?php echo $dispo;?>>
    </form>

</div>