
<?php echo validation_errors(); ?>

<?php echo form_open('Affiche_Produit/editProduit'); ?>


<div class="form-group">
    <input type="hidden" class="form-control" id="idM" placeholder="Name" name="idM"  style="width: 20%"
    value="<?php if(isset($_POST['idM'])) echo $_POST['idM']; ?>">
</div>

<div class="form-group">
    <label for="nom">Name</label>
    <input type="input" class="form-control" id="nom" placeholder="Name" name="nom"  style="width: 20%"
           value="<?php echo $produit['nom']?> ">
</div>

<div class="form-group">
    <label for="type">Type</label>
    <input type="input" class="form-control" id="type" placeholder="Type" name="type"  style="width: 20%"
           value="<?php echo $produit['typeProduit_id']?> ">
</div>

<div class="form-group">
    <label for="prix">Price</label>
    <input type="input" class="form-control" id="prix" placeholder="Price" name="prix"  style="width: 20%"
           value="<?php echo $produit['prix']?> ">
</div>

<div class="form-group">
    <label for="type">Photo</label>
    <input type="input" class="form-control" id="photo" placeholder="Photo" name="photo"  style="width: 20%"
           value="<?php echo $produit['photo']?> ">
</div>
<div class="form-group">
    <input type="submit" name="Update" value="Update" class="btn btn-default" />
</div>
</div>


</form>
