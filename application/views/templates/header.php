<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chez Lei</title>
    <!-- jquery -->
    <script src="<?php echo base_url()?>assets/jquery-3.2.0.min.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
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
                <li><a href="<?php echo site_url('Affiche_Produit');?>">首页 <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">商品分类 <span class="caret"></span></a>
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
                <li><a href="#">新品上架</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search" action="<?php echo base_url().'index.php/Affiche_Produit/search_produit' ;?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="商品搜索" name="search" id="search">
                </div>
                <button type="submit" class="btn btn-default glyphicon glyphicon-search" ></button>
            </form>

            <div class=" col-md-2 col-md-offset-0.5">
            </div>
            <ul class="nav navbar-nav">
                <?php $user = $this->session->userdata('user');?>
                <?php if (empty($user)) :?>
                    <p>您好，欢迎来到<b>Chez Lei商城</b>
                    <li><a href="#" type="button" data-toggle="modal" data-target="#signup" >注册</a></li>
                    <li><a href="#" type="button" data-toggle="modal" data-target="#signin" >登录</a></li>

                <?php else :?>
                    <p><?php echo $user['nom'];?>, 您好，欢迎来到<b>Chez Lei</b> [<a href="<?php echo site_url('user/logout');?>">注销</a>]</p>

                    <li><a href="<?php echo site_url('Affiche_Panier');?>">购物车</a></li>
                    <?php $user = $this->session->userdata('user');?>
                    <?php if ( $user['droit']=='DROITadmin' ):?>
                    <li><a href="<?php echo site_url('commande/allCommande');?>">管理订单</a></li>
                    <?php endif;?>
                <?php $user = $this->session->userdata('user');?>
                <?php if ( $user['droit']!='DROITadmin' ):?>
                    <li><a href="<?php echo site_url('commande');?>">我的订单</a></li>
                    <?php endif;?>
                <?php endif;?>
            </ul>
            <div class=" col-md-2 col-md-offset-0.5" style="float: right" >

            </div>
        </div>
    </div>
</nav>

<!-- Modal 注册-->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" align="center">加入磊家</h4>
                <h6 class="modal-title" id="myModalLabel" align="center">梅斯最实惠的中超</h6>
            </div>
                <?php echo form_open(''); ?>
            <div class="modal-body">
                <input type="text" class="form-control" placeholder="姓名" name="nom">
                </br>
                <input type="text" class="form-control" placeholder="邮箱" name="mail">
                </br>
                <input type="text" class="form-control" placeholder="密码(不少于6位)" name="mdp">
                </br>
                <input type="text" class="form-control" placeholder="地址(仅限梅斯地区)" name="adresse">
                </br>
                <input type="text" class="form-control" placeholder="电话(选填)" name="tel">
                </br>
            </div>
            <div class="modal-footer">
                <?php echo validation_errors(); ?>
                    <button type="submit" id="signup" class="btn btn-primary btn-lg btn-block" name="signup">注册</button>
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
                <h4 class="modal-title" id="myModalLabel">登录</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('user/login'); ?>
                <input type="text" class="form-control" name="email" placeholder="邮箱">
                </br>
                <input type="password" class="form-control" name="password" placeholder="密码">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
            </div>
                </form>
        </div>
    </div>
</div>

<!-- 注册和登录按钮触发事件，因为如果写在control要每页都复制这个事件，暂时找不到更好的解决方法，所以写在这里-->
<?php
if(isset($_POST['signup'])){
    $nom=$_POST['nom'];
    $mail=$_POST['mail'];
    $mdp=$_POST['mdp'];
    $adresse=$_POST['adresse'];
    $tel=$_POST['tel'];
    $this->Signup_Signin_Model->Signup($nom,$mail,$mdp,$adresse ,$tel);
    if ($user = $this->Signup_Signin_Model->get_user($mail,$mdp)) {
        #成功，将用户信息保存至session
        $this->session->set_userdata('user',$user);
        redirect('Affiche_Produit');
    }
}
?>


