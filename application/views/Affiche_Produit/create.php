<?php
//图片格式
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);
?>

<h2><?php echo $title; ?></h2>

<?php echo form_open('Affiche_Produit/createProduit','id="create"'); ?>
<form data-toggle="validator" role="form">
<div class="form-group">
    <label for="nom">Name</label>
    <?php echo form_error('nom'); ?>
    <input type="input" class="form-control" id="nom" placeholder="Name" name="nom"  style="width: 20%"
           value="<?php echo set_value('nom'); ?>" required>
</div>

<div class="form-group">
    <label>Type: </label>
    <select class="btn btn-default dropdown-toggle"name="type" button class="btn btn-default dropdown-toggle">
        <?php foreach ($typeProduits as $donnes): ?>
            <option value="<?php echo $donnes['id']?>" ><?php echo $donnes['libelle']?></option>
        <?php endforeach; ?>
    </select>

</div>

<div class="form-group">
    <label for="prix">Price</label>
    <?php echo form_error('prix'); ?>
    <input type="input" class="form-control" id="prix" placeholder="Price" name="prix"  style="width: 20%"
           value="<?php echo set_value('prix'); ?>">
</div>

<div class="form-group">
    <label for="dispo">Dispo</label>
    <input type="input" class="form-control" id="dispo" placeholder="Dispo" name="dispo"  style="width: 20%"
           value="<?php echo set_value('dispo'); ?>">
</div>

<div class="form-group">
    <label for="stock">Stock</label>
    <input type="input" class="form-control" id="stock" placeholder="Stock" name="stock"  style="width: 20%"
           value="<?php echo set_value('stock'); ?>">
</div>

<div class="form-group">
    <label for="type">Photo</label>
    <input type="input" class="form-control" id="photo" placeholder="Photo" name="photo"  style="width: 20%">
</div>

<div class="form-group">
        <input type="submit" name="submit" value="Create news item" class="btn btn-default" />
    </div>
</form>


<!-- 存照片 -->
<form enctype="multipart/form-data" method="post" name="upform">
    déposer le photo
    <input name="upfile" type="file">
    <input type="submit" value="Valider" name="Valider"><br>
    <?php
    if(isset($_POST['Valider'])) {
        //il faut remplir le $nomdephoto à l'id_etu
        $file = $_FILES["upfile"];
        $nom = $file['name'];
        //echo "".$file['name'];
        //echo "</br>";
        //echo "".$file['type'];
        $type = substr($nom, strpos($nom, '.'));
        echo "</br>";
        //echo "".$type;
        echo "succece";

        if (!in_array($file["type"], $uptypes)) //verifier le type de fichier
        {
            echo "c'est pas une photo" . $file["type"];
            exit;
        }
        //le nom de photo va changer à id_etu+$type
        move_uploaded_file($_FILES["upfile"]["tmp_name"],"assets/img/" . $nom);
        echo "</br>";
        ?>
        <td><img src="<?php echo base_url()?>assets/img/<?php echo $nom?>" width="50" alt="photo"/></td>
        <?php
    }
    ?>
</form>