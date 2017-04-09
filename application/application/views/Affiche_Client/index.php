<h2><?php echo $title; ?></h2>

<?php foreach ($client as $unclient): ?>

    <h3><?php echo $unclient['nom'].' '.$unclient['prenom'] ?></h3>

    <div class="main">
        <?php echo 'adresse: '.$unclient['adresse'];
              echo "</br>";
              echo 'tel: '. $unclient['tel'];
              echo "</br>";
              echo 'email: '. $unclient['email'];

        ?>
    </div>

    </br>

<?php endforeach; ?>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#div1").fadeIn();
            $("#div2").fadeIn("slow");
            $("#div3").fadeIn(3000);
        });
    });
</script>
<p>以下实例演示了 fadeIn() 使用了不同参数的效果。</p>
<button>点击淡入 div 元素。</button>
<br><br>
<div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
<div id="div2" style="width:80px;height:80px;display:none;background-color:green;"></div><br>
<div id="div3" style="width:80px;height:80px;display:none;background-color:blue;"></div>


