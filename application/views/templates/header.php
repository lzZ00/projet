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
                <li><a href="#">首页 <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">商品分类 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">主食</a></li>
                        <li><a href="#">休闲食品</a></li>
                        <li><a href="#">方便面</a></li>
                        <li class="divider"></li>
                        <li><a href="#">调料</a></li>
                        <li><a href="#">即食品</a></li>
                        <li class="divider"></li>
                        <li><a href="#">干货</a></li>
                        <li><a href="#">蔬菜</a></li>
                    </ul>
                </li>
                <li><a href="#">新品上架</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="商品搜索">
                </div>
                <button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
            </form>

            <div class=" col-md-2 col-md-offset-0.5">
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#" type="button" data-toggle="modal" data-target="#signup" >注册</a></li>
                <li><a href="#" type="button" data-toggle="modal" data-target="#signin" >登录</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal 注册-->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">注册</h4>
            </div>
            <div class="modal-body">
                <p>n'import quoi</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 登录-->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">登录</h4>
            </div>
            <div class="modal-body">
                <p>n'import quoio</p>
                <input type="text" class="form-control" placeholder="邮箱或登录名">
                </br>
                <input type="text" class="form-control" placeholder="密码">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

