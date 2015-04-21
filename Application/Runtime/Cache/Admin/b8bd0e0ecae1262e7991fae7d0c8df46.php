<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>管理首页</title>
    <meta name="keywords" content="管理首页"/>
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
    <?php if($_SESSION['user_id']!= ''): ?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">巨搜Shop</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Goods/goodsList');?>">商品管理</a></li>
                <li><a href="<?php echo U('Order/orderList');?>">订单管理</a></li>
                <li><a href="<?php echo U('Address/addressList');?>">地址管理</a></li>
                <li><a href="<?php echo U('Comment/commentList');?>">评论管理</a></li>
                <li><a href="<?php echo U('User/userList');?>">会员管理</a></li>
                <li><a href="<?php echo U('Shop/storeSetting');?>">商店设置</a></li>
            </ul>
        </div>
    </nav><?php endif; ?>



 <div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsList');?>">商品列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsAdd');?>">添加商品</a></li>
        <li class="list-group-item"><a href="<?php echo U('Category/categoryList');?>">商品分类</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandList');?>">商品品牌</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsRecycleBinList');?>">商品回收站</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandRecycleBinList');?>">品牌回收站</a></li>
    </ul>
</div>

<div class="separator"></div>

<div class="right">
    <table class="table table-responsive table-bordered table_show">
        <caption>系统基本信息</caption>
        <thead>
            <tr>
                <th>信息</th>
                <th>版本</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    php 版本：
                </td>
                <td>
                    <?php echo PHP_VERSION; ?>
                </td>
            </tr>
            <tr>
               <td>
                    mysql 版本：
               </td>
                <td>
                    <?php echo mysql_get_server_info(); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Thinkphp 版本：
                </td>
                <td>
                    <?php echo THINK_VERSION; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Apache 版本：
                </td>
                <td>
                    <?php echo apache_get_version(); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>