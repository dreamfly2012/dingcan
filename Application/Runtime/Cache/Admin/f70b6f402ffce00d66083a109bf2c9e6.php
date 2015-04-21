<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>设置新密码</title>
    <meta name="keywords" content="设置新密码"/>
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
    <?php if($_SESSION['user_id']!= ''): ?><nav class="navbar navbar-inverse" role="navigation">
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
    </nav><?php endif; ?>



<div class="container-fluid login-form login">
    <section>
        <h1><strong>重设密码</strong> </h1>
        <form action="<?php echo U('Login/newPasswordHandle');?>" method="post" id="myform">
            <div class="form-group">
              <label for="user_name">新密码</label>
              <input type="password" class="form-control" id="password" name="password"
                 placeholder="新密码">
            </div>
            <div class="form-group">
              <label for="user_name">确认新密码</label>
              <input type="password" class="form-control" id="rpassword" name="rpassword"
                 placeholder="确认密码">
            </div>
            <button class="blue">修改</button>
        </form>
        <p><a href="<?php echo U('Login/login');?>">登陆</a></p>
    </section>
</div>

<script type="text/javascript" src="/Public/Admin/jqvalidate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/Admin/jqvalidate/messages_zh.min.js"></script>
<script type="text/javascript">
    $("#myform").validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            rpassword:{
                required:true,
                minlength: 6,
                equalTo:"#password"
            }
        }
    });
</script>

<link rel="stylesheet" href="/Public/Admin/jqtree/jqtree.css" />
<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/jqtree/tree.jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>
</body>
</html>