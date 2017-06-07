<div class="col-md-10 col-md-offset-1">
    <h4 align="center"></h4>

    <font size="20" color="#00008b"> <?php   echo $product['nom']; ?></font>
    <br/>
    <font size="20" color="#00008b"> <?php   echo $product['prix']; ?></font>
    <br/>
   <font size="20" color="#00008b"> Stock : <?php   echo $product['dispo']; ?></font>
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

    </br>


</div>