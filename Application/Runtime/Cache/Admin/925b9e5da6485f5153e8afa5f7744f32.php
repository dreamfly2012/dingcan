<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>忘记密码</title>
    <meta name="keywords" content="忘记密码"/>
    <meta name="description" content="找回密码"/>
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
    <?php if(!is_null(session('uid'))): ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
              <span class="sr-only">巨搜Shop<</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#">巨搜Shop</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-1">>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Goods/goodsList');?>">商品管理</a></li>
                <li><a href="<?php echo U('Brand/brandList');?>">品牌管理</a></li>
                <li><a href="<?php echo U('Category/categoryList');?>">类别管理</a></li>
                <li><a href="<?php echo U('Order/orderList');?>">订单管理</a></li>
                <li><a href="<?php echo U('Ad/adList');?>">广告管理</a></li>
                <li><a href="<?php echo U('Address/addressList');?>">地址管理</a></li>
                <li><a href="<?php echo U('Comment/commentList');?>">评论管理</a></li>
                <li><a href="<?php echo U('Member/memberList');?>">会员管理</a></li>
                <li><a href="<?php echo U('Store/storeBasicSetting');?>">商店设置</a></li>
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Login/logout');?>">注销</a></li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            </ul>
        </div>
    </nav>
    <?php endif; ?>
   
  



<div class="container-fluid login-form login">
    <section>
        <h1><strong>找回密码</strong> </h1>
        <form name="form" id="form" action="<?php echo U('Login/findPasswordHandle');?>" method="post" class="form form-horizontal">
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label">邮箱</label>
              <div class="col-sm-9">
                <input type="text" id="email" name="email" placeholder="邮箱" class="form-control">
              </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success form-control" value="找回密码" />
            </div>
        </form>
        <p class="help-block"><a href="<?php echo U('Login/login');?>">登陆</a></p>
    </section>
</div>

<script type="text/javascript" src="/Public/Admin/jqvalidate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/Admin/jqvalidate/messages_zh.min.js"></script>
<script type="text/javascript">
    $("#form").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        }
    });
</script>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>