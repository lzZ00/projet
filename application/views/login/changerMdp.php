
<div align="center">

    <?php echo form_open('user/changerMdp'); ?>

<div class="form-group">
    <label for="password">New Password</label>
    <?php echo form_error('password'); ?>
    <input type="password" class="form-control" id="password" placeholder="password" name="password"  style="width: 20%">
</div>

<div class="form-group">
    <label for="passconf">Password Confirm</label>
    <?php echo form_error('passconf'); ?>
    <input type="input" class="form-control" id="passconf" placeholder="Password_Confirm" name="passconf"  style="width: 20%"
          >
</div>
    <div class="form-group">
        <button type="submit" id="signup" class="btn btn-success" name="signup" style="width: 5%">Modifier</button>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="<?php echo site_url('user/profil')?>" class="btn btn-danger"> annuler</a>
    </div>
    </form>
</div>