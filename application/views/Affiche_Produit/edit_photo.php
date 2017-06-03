 <div class="col-md-10 col-md-offset-1">
        <h4 align="center">Edit_photo</h4>

        <font size="20" color="#00008b">id: <?php echo $rowid ?></font>
        <?php
             foreach ($product as $value){
                 $nom=$product['nom'];
                 $photo=$product['photo'];
             }
        ?>
        </br>
        </br>
        <?php
             if($photo!=null){
                 echo"<img src='../../../assets/img/".$photo."' img-rounded height='200' class='img-rounded'/>";
             }
        ?>

        <?php if($error!=null) echo $error;?>

        <?php $attributes = array('class' => "form-inline");?>
        <?php echo form_open_multipart('Affiche_Produit/do_upload_photo/'.$rowid,$attributes);?>
        <input type="file" name="photo" size="20" />
        <p class="help-block">支持上传格式: png,gif,jpg,jpeg。不超过4M</p>

        <input type="submit" value="upload" class="btn btn-primary"/>

        </form>


        </br>
        </br>
        <a href="<?php echo base_url('/index.php/Affiche_Produit') ?>" class="btn btn-default">done</a>
        <a  href="<?php echo base_url('/index.php/Affiche_Produit/createProduit') ?>" class="btn btn-default">add_new_product</a>

    </div>
<?php
$i=0;
/*
if ($photo!=null){
    foreach ($photos as $value) {
        echo '<div class="modal fade" id="suprimer'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
        echo '<div class="modal-dialog modal-sm" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<h4 class="modal-title" id="myModalLabel">删除确认</h4>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<p>确定要删除吗？</p>';
        echo '<a href="'.base_url('/index.php/products/delete_photo_by_name/'.$rowid.'/'.$value).'" class="btn btn-danger"value="Supprimer" name="Supprimer" >'.lang('yes').'</a>';
        echo '&nbsp';
        echo '<button type="submit" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >'.lang('cancel').'</button>';
        echo '</br>';


        echo '</div>
            </div>
        </div>
    </div>';
        $i=$i+1;
    }
}
?>
*/