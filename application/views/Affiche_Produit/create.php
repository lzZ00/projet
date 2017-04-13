<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Affiche_Produit/createProduit'); ?>

<div class="form-group">
    <label for="nom">Name</label>
    <input type="input" class="form-control" id="nom" placeholder="Name" name="nom"  style="width: 20%">
</div>

<div class="form-group">
    <label>Type: </label>
    <select name="type" button class="btn btn-default dropdown-toggle">
        <?php foreach ($typeProduits as $donnes): ?>
            <option value="<?php echo $donnes['id']?>" ><?php echo $donnes['libelle']?></option>
        <?php endforeach; ?>
    </select>

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



