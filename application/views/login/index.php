<script type="text/javascript">
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txt").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("txt").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "http://localhost:8080/projetWeb/index.php/UniqueLogin/test/?q=" + str, true);
            xmlhttp.send();
        }
    }

    function showEmail(str) {
        if (str.length == 0) {
            document.getElementById("txtEmail").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("txtEmail").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "http://localhost:8080/projetWeb/index.php/UniqueLogin/testEmail/?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
 <h4 class="modal-title" id="myModalLabel" align="center">加入磊家</h4>
 <h6 class="modal-title" id="myModalLabel" align="center">梅斯最实惠的中超</h6>

     <?php echo form_open('user/signup'); ?>
<div align="center">
     <form data-toggle="validator" role="form" align="center">
                <div class="form-group">
                    <label for="nom">Username</label>
                    <?php echo form_error('nom'); ?>
                    <input type="input" class="form-control" id="nom" placeholder="Name" name="nom"  style="width: 20%"
                           value="<?php echo set_value('nom'); ?>" onkeyup="showHint(this.value)" required>
                </div>
                <p><span id="txt"></span></p>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <?php echo form_error('mail'); ?>
                    <input type="input" class="form-control" id="mail" placeholder="Mail" name="mail"  style="width: 20%"
                           value="<?php echo set_value('mail'); ?>" onkeyup="showEmail(this.value)"  required>
                </div>
                <p><span id="txtEmail"></span></p>

                <div class="form-group">
                    <label for="mdp">Password</label>
                    <?php echo form_error('mdp'); ?>
                    <input type="password" class="form-control" id="mdp" placeholder="mdp" name="mdp"  data-minlength="6"
                           style="width: 20%"  value="<?php echo set_value('mdp'); ?>"  required>
                </div>


                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <?php echo form_error('adresse'); ?>
                    <input type="input" class="form-control" id="adresse" placeholder="adresse" name="adresse"  style="width: 20%"
                           value="<?php echo set_value('adresse'); ?>"  required>
                </div>

                <div class="form-group">
                    <label for="tel">Tel</label>
                    <?php echo form_error('tel'); ?>
                    <input type="input" class="form-control" id="tel" placeholder="tel" name="tel"  style="width: 20%"
                           value="<?php echo set_value('tel'); ?>"  required>
                </div>

                <div class="form-group">
                <button type="submit" id="signup" class="btn btn-primary btn-lg btn-block" name="signup" style="width: 5%">注册</button>
                </div>
                </form>
     </div>


