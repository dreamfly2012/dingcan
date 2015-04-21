<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>订单列表页</title>
    <meta name="keywords" content=""/>
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
                <li><a href="<?php echo U('User/userList');?>">会员管理</a></li>
                <li><a href="<?php echo U('Store/storeBasicSetting');?>">商店设置</a></li>
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Login/logout');?>">注销</a></li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            </ul>
        </div>
    </nav>
    <?php endif; ?>
   
  



<div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Store/storeBasicSetting');?>">基本信息</a></li>
        <li class="list-group-item"><a href="<?php echo U('Store/storeDisplaySetting');?>">显示设置</a></li>
    </ul>
</div>

<div class="right">
    <div class="container">
        <h2>商店基本信息</h2>
        <form action="<?php echo U('Store/storeDisplaySettingHandle');?>" method="post" class="form" role="form">
            <div class="form-group">
                <label for="display_name">商店名称</label>
                <input type="text" name="display_name" id="display_name" value="<?php echo ($store["display_name"]); ?>" class="form-control" placeholder="商店名称">
            </div>

            <div class="form-group">
                <label for="title">商店标题</label>
                <input type="text" name="title" id="title" value="<?php echo ($store["title"]); ?>" class="form-control"  placeholder="商店标题">
            </div>

            <div class="form-group">
                <label for="keywords">商店关键字</label>
                <input type="text" name="keywords"id="keywords" value="<?php echo ($store["keywords"]); ?>"  class="form-control" placeholder="商店关键字">
            </div>

            <div class="form-group">
                <label for="address">详细地址</label>
                <input type="text" name="address" id="address" value="<?php echo ($store["address"]); ?>" class="form-control" placeholder="详细地址">
            </div>

            <div class="form-group">
                <label for="service_phone">客服电话</label>
                <input type="text" name="service_phone" id="service_phone" value="<?php echo ($store["service_phone"]); ?>" class="form-control" placeholder="客服电话">
            </div>

            <div class="form-group">
                <label for="service_qq">客服qq</label>
                <input type="text" name="service_qq" id="service_qq"  value="<?php echo ($store["service_qq"]); ?>" class="form-control" placeholder="客服qq">
            </div>

            <div class="form-group">
                <label for="service_email">客服邮件</label>
                <input type="text" name="service_email" id="service_email" value="<?php echo ($store["service_email"]); ?>" class="form-control" placeholder="客服邮件">
            </div>

            <div class="form-group">
                <label for="notice_user">用户中心公告</label>
                <input type="text" name="notice_user" id="notice_user"  value="<?php echo ($store["notice_user"]); ?>" class="form-control" placeholder="用户中心公告">
            </div>

            <div class="form-group">
                <label for="notice_shop">商店公告</label>
                <input type="text" name="notice_shop" id="notice_shop"  value="<?php echo ($store["notice_shop"]); ?>" class="form-control" placeholder="商店公告">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success form-control">确定</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>