<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Affiche_Produit/createProduit'); ?>

<div class="form-group">
    <label for="nom">Name</label>
    <input type="input" class="form-control" id="nom" placeholder="Name" name="nom"  style="width: 20%">
</div>

<div class="form-group">
    <label for="type">Type</label>
    <input type="input" class="form-control" id="type" placeholder="Type" name="type"  style="width: 20%">
</div>

<div class="form-group">
    <label for="prix">Price</label>
    <input type="input" class="form-control" id="prix" placeholder="Price" name="prix"  style="width: 20%">
</div>

<div class="form-group">
    <label for="type">Photo</label>
    <input type="input" class="form-control" id="photo" placeholder="Photo" name="photo"  style="width: 20%">
</div>
<div class="form-group">
        <input type="submit" name="submit" value="Create news item" class="btn btn-default" />
    </div>
</div>


</form>