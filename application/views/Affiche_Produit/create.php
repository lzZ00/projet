<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Affiche_Produit/createProduit'); ?>

<label for="nom">Name</label>
<input type="input" name="nom" /><br />

<label for="type">Type</label>
<input type="input" name="type" /><br />

<label for="prix">Price</label>
<input type="input" name="prix" /><br />

<label for="photo">Photo</label>
<input type="input" name="photo" /><br />


<input type="submit" name="submit" value="Create news item" />

</form>