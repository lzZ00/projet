<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/css3.css"">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BZSM</title>
    <!-- jquery -->
    <script src="<?php echo base_url()?>assets/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/login.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery4.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->


</head>
<body class="container">
<div class="row">
    <div class="col-sm-12">
        <nav class="navbar navbar-default">
            <div class="container-fluid row">
                <div class="navbar-header col-md-2 col-md-offset-3">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url('Affiche_Produit');?>"><?php echo lang('Home')?> <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo lang('Categories')?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url('/index.php/Affiche_Produit/type1Produit') ?>">主食</a></li>
                                <li><a href="<?php echo base_url('/index.php/Affiche_Produit/type2Produit') ?>">休闲食品</a></li>
                                <li><a href="<?php echo base_url('/index.php/Affiche_Produit/type3Produit') ?>">方便面</a></li>
                                <li class=""></li>
                                <li><a href="<?php echo base_url('/index.php/Affiche_Produit/type1Produit') ?>">调料</a></li>
                                <li><a href="<?php echo base_url('/index.php/Affiche_Produit/type1Produit') ?>">即食品</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('/index.php/Affiche_Produit/type1Produit') ?>">干货</a></li>
                                <li><a href="<?php echo base_url('/index.php/Affiche_Produit/type1Produit') ?>">蔬菜</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><?php echo lang('News')?></a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" action="<?php echo base_url().'index.php/Affiche_Produit/search_produit' ;?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="search" name="search" id="search">
                        </div>
                        <button type="submit" class="btn btn-default glyphicon glyphicon-search" ></button>
                    </form>

                    <div class=" col-md-2 col-md-offset-0.5">
                    </div>
                    <ul class="nav navbar-nav">

                        <?php $user = $this->session->userdata('user');?>
                        <?php if (empty($user)) :?>
                            <p>    &nbsp&nbsp <?php echo lang('Hello')?>,<?php echo lang('Welcome')?><!--<b>Chez Lei商城</b>--></p>
                            <li><a href="<?php /*echo site_url('user/signup');*/?>"  type="button"  data-toggle="modal" data-target="#signup"  ><?php echo lang('signup')?></a></li>

                            <li><a href="#" type="button" data-toggle="modal" data-target="#signin" ><?php echo lang('signin')?></a></li>

                        <?php else :?>
                            <p>&nbsp&nbsp&nbsp&nbsp<?php echo $user['nom'];?>, <?php echo lang('Hello')?>,<?php echo lang('Welcome')?><!--<b>Chez Lei</b>--> [<a href="<?php echo site_url('user/logout');?>"><?php echo lang('logout')?></a>]</p>
                            <?php if ( $user['droit']!='DROITadmin' && (!empty($user) )):?>

                                <li style="position:relative" ><a href="<?php echo site_url('Affiche_Panier');?>" id="cart"><?php echo lang('Cart')?></a>

                                    <span id="carts">
                        <div id="cartss">
                            <a href="#" onclick="return false"><span id="close"><i class="fa fa-close"></i></span></a>
                            <div class="getmessage" id="img"></div>
                            <div class="getmessage1" id="namee"></div>
                            <div class="getmessage1" id="num"></div>
                            <div class="getmessage" id="price"></div>
                        </div>
                      </span>
                                </li>

                            <?php endif;?>
                            <?php $user = $this->session->userdata('user');?>
                            <?php if ( $user['droit']=='DROITadmin' ):?>
                                <li><a href="<?php echo site_url('commande/allCommande');?>">Order management</a></li>
                            <?php endif;?>
                            <?php $user = $this->session->userdata('user');?>
                            <?php if ( $user['droit']!='DROITadmin' ):?>

                                <li><a href="<?php echo site_url('commande');?>"><?php echo lang('My orders')?></a></li>
                                <li><a href="<?php echo site_url('user/profil');?>"><?php echo lang('Profile')?></a></li>
                            <?php endif;?>
                        <?php endif;?>
                        <li><a href="<?php echo base_url('/index.php/Affiche_Produit/lang_english?url='.current_url())?>"  type="button"   > <img src="<?php echo base_url()?>assets/img/fr.jpg" height="30" ></a></li>
                        <li><a href="<?php echo base_url('/index.php/Affiche_Produit/lang_chinese?url='.current_url())?>"  type="button"   ><img src="<?php echo base_url()?>assets/img/cn.png" height="25" ></a></li>

                    </ul>
                    <div class=" col-md-2 col-md-offset-0.5" style="float: right" >

                    </div>
                </div>
            </div>
        </nav>


        <!--<p><b>Start typing a name in the input field below:</b></p>

        First name: <input type="text" onkeyup="showHint(this.value)">-->

        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" align="center">Welcome</h4>
                        <!--  <h6 class="modal-title" id="myModalLabel" align="center">梅斯最实惠的中超</h6>-->
                    </div>
                    <form method="post" id="sign" action="<?php echo site_url('user/signup')?>">
                        <div class="modal-body">
                            <h5>Username</h5>
                            <?php echo form_error('nom'); ?>
                            <input type="text" class="form-control" placeholder="Name" name="nom"  id="nom" onkeyup="showHint(this.value)"
                                   required  >
                            <p>Suggestions: <span id="txtHint"></span></p>

                            <h5>Email</h5>
                            <?php echo form_error('mail'); ?>
                            <input type="email" class="form-control" placeholder="Mail" name="mail" id="mail" onkeyup="showEmail(this.value)" required >
                            <p>Suggestions: <span id="txtEmail"></span></p>
                            <h5>Password</h5>
                            <input type="password" class="form-control" placeholder="password(not less than six digits)" name="mdp" required>
                            </br>
                            <input type="text" class="form-control" placeholder="adresse" name="adresse">
                            </br>
                            <input type="text" class="form-control" placeholder="tel" name="tel">
                            </br>
                        </div>
                        <div class="modal-footer">
                            <?php echo validation_errors(); ?>
                            <button type="submit" id="signup" class="btn btn-primary btn-lg btn-block" name="signup">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    ?>

    <!-- Modal 登录-->
    <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Log in</h4>
                </div>
                <div class="loginpanel">
                    <div>
                        <div class="modal-body">
                            <?php echo form_open('user/login'); ?>
                            <input type="text" id="username" class="form-control" name="email" placeholder="email" required autofocus onkeypress="check_values();">
                            </br>
                            <input type="password" id="password" class="form-control" name="password" placeholder="password" required onkeypress="check_values();">
                        </div>
                        <div class="buttonwrapper">
                            <button type="submit" id="loginbtn" class="btn btn-warning loginbutton" >To log in
                                <span class="fa fa-check"></span>
                            </button>
                            <span id="lockbtn" class="fa fa-lock lockbutton redborder"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</body>
<!-- 注册和登录按钮触发事件，因为如果写在control要每页都复制这个事件，暂时找不到更好的解决方法，所以写在这里-->
<?php
$this->load->library('form_validation');
if(isset($_POST['signup'])){
    $nom=$_POST['nom'];
    $mail=$_POST['mail'];
    $mdp=($_POST['mdp']);
    $adresse=$_POST['adresse'];
    $tel=$_POST['tel'];
    $mdp1=md5($mdp);
    $this->Signup_Signin_Model->Signup($nom,$mail,$mdp1,$adresse ,$tel);
    if ($user = $this->Signup_Signin_Model->get_user($mail,$mdp)) {
        #成功，将用户信息保存至session
        $this->session->set_userdata('user',$user);
        redirect('Affiche_Produit');
    }
}
?>
<!-- Modal 注册-->
<script type="text/javascript">
    function loginUnique(str){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState==4 && xmlhttp.status == 200){
                var resu = xmlhttp.responseText;
                console.log(resu);
                document.getElementById("uniquenom").innerHTML = resu;
            }
        }
        xmlhttp.open("GET","UniqueLogin?q="+str,true);
        xmlhttp.send();
    }
</script>

<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "UniqueLogin/test/?q="+ str, true);
            xmlhttp.send();
        }
    }


</script>

<script>

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
            xmlhttp.open("GET", "../index.php/UniqueLogin/testEmail/?q=" + str, true);
            xmlhttp.send();
        }
    }


</script>

<script>
    $(document).ready(function(){
        $("#sign").validate({
            rules:{
                mdp:{
                    required:true,
                    minlength:6,
                }
            }});
        tt();

    })
</script>




