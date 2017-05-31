<div align="center">
<?php echo validation_errors(); ?>

<?php echo form_open('user/editProfil'); ?>

<div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="input" class="form-control" id="adresse" placeholder="adressee" name="adresse"  style="width: 20%"
           value="<?php echo $produit['adresse']?> ">
</div>

<div class="form-group">
    <label for="tel">Tel</label>
    <input type="input" class="form-control" id="tel" placeholder="tel" name="tel"  style="width: 20%"
           value="<?php echo $produit['tel']?> ">
</div>




<div class="form-group">
    <input type="submit" value="Mettre à jour" name="Update" class="btn btn-success"/>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="<?php echo site_url('user/profil')?>" class="btn btn-danger"> annuler</a>
</div>
</form>
</div>