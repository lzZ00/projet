
<?php echo form_open('Affiche_Produit/createProduit'); ?>
<?php echo validation_errors(); ?>
<input type="submit" value="add" name="add" class="bg-primary">
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
            <a href=" ">modifier</a>
            <a href=>supprimer</a>
            <?php echo form_open('Affiche_Produit'); ?>
                <?php echo validation_errors(); ?>
                <input type="submit" value="Sup" name="Sup">
                <?php $idS=$donnes['id']; ?>
                <input type="hidden" name="idS" value=<?php echo $idS;?>>
            </form>
        </td>
        </tr>
    </form>
<?php endforeach; ?>
</table>

