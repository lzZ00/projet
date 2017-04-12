
<a href="<?php echo base_url('/index.php/Affiche_Produit/createProduit')?>" class="btn btn-primary">
   Ajouter un Produit
</a>
<br/><br/>
<table class="table table-hover">
    <tr><th>nom</th><th>prix</th><th>operation</th>
    </tr>
    </thead>
<?php foreach ($produits as $donnes): ?>
    <tr>
  <td> <?php echo $donnes['nom']?> </td>
    <td><?php echo $donnes['prix']?></td>
        <td>
            <?php echo form_open('Affiche_Produit'); ?>
                <?php echo validation_errors(); ?>
                <input type="submit" value="Supprimer" name="Supprimer" class="btn btn-danger">
                <?php $idS=$donnes['id']; ?>
                <input type="hidden" name="idS" value=<?php echo $idS;?>>
            </form>
            <?php echo form_open('Affiche_Produit/editProduit'); ?>
            <?php echo validation_errors(); ?>
            <input type="submit" value="Modifier" name="Modifier" class="btn btn-warning">
            <?php $idM=$donnes['id']; ?>
            <input type="hidden" name="idM" value=<?php echo $idM;?>>
            </form>
        </td>
        </tr>
    </form>
<?php endforeach; ?>
</table>

