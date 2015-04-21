<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
    <meta name="keywords" content="登陆"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/dist/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/dist/css/common.css">

    <script type="text/javascript" src="/Public/Admin/dist/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/dist/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/Public/Admin/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/ckeditor/ckeditor.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">巨搜Shop</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Goods/goodsList');?>">商品管理</a></li>
                <li><a href="<?php echo U('Orders/ordersList');?>">订单管理</a></li>
                <li><a href="<?php echo U('Commnet/commentsList');?>">评论管理</a></li>
                <li><a href="<?php echo U('User/usersList');?>">会员管理</a></li>
                <li><a href="<?php echo U('Shop/storeSetting');?>">商店设置</a></li>
            </ul>
        </div>
    </nav>



<div class="container-fluid login-form login">
    <section>
        <h1><strong>巨搜商店</strong> </h1>
        <form method="link" action="<?php echo U('Login/loginHandle');?>" method="post">
            <input type="text" name="user_name" placeholder="用户名">
            <input name="password" type="password" placeholder="密码">
            <button class="blue">登陆</button>
        </form>
        <p><a href="#">Forgot your password?</a></p>
    </section>
</div>
</body>
</html>