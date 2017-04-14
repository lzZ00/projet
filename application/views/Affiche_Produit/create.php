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

<?php echo validation_errors(); ?>

<?php echo form_open('Affiche_Produit/createProduit'); ?>

<div class="form-group">
    <label for="nom">Name</label>
    <input type="input" class="form-control" id="nom" placeholder="Name" name="nom"  style="width: 20%">
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

<form enctype="multipart/form-data" method="post" name="upform">
    déposer le photo
    <input name="upfile" type="file">
    <input type="submit" value="Valider" name="Valider"><br>
    <?php
    //il faut remplir le $nomdephoto à l'id_etu
    $nomdephoto=$_POST['nom'];
    $id=$_POST['id'];

    if(isset($_POST['Valider'])){
        $file = $_FILES["upfile"];
        $nom=$file['name'];
        //echo "".$file['name'];
        //echo "</br>";
        //echo "".$file['type'];
        $type=substr($nom,strpos($nom,'.'));
        echo "</br>";
        //echo "".$type;
        echo "succece";

        if(!in_array($file["type"], $uptypes))

            //verifier le type de fichier
        {
            echo "c'est pas une photo".$file["type"];
            exit;
        }
        //le nom de photo va changer à id_etu+$type
        move_uploaded_file($_FILES["upfile"]["tmp_name"],
            "photos/" .$nomdephoto.$type);



        echo "</br>";
        $nomfinal="$nomdephoto$type";
        echo "".$nomfinal;

        //sauvegarder le nom de photo dans bdd
        $objPdo->query("UPDATE Etudiant
		SET photo='$nomfinal'
		WHERE identifiant='$id'");
        header ("location:?page=pageetu");
    }
    //if l'etudent a deja met l'image
    $photostocke=$objPdo->query("SELECT photo FROM Etudiant 
	where identifiant='$id'");

    if($photostocke!=null){
        $photo = $photostocke->fetch();
        echo "<img src=\"photos/". $photo['photo'] . "\"  width=\"200\" alt=\"photo\" />";

    }


    ?>
</form>
