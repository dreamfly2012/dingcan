<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商品品牌管理</title>
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



<div class="left">
    <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsList');?>">商品列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsAdd');?>">添加商品</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsCategory');?>">商品分类</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsBrand');?>">商品品牌</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsRecycleBinList');?>">商品回收站</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsSku');?>">商品sku</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsGallery');?>">商品相册</a></li>
	</ul>
</div>

<div class="separator"></div>

<div class="right">
    <h1>商品品牌的管理</h1>
    <div class="container">
        <div class="col-md-6">
            <div id="brand_manage"></div>
        </div>
        <div class="col-md-6">
            <button id="add_brand" class="btn btn-default">添加新的分类</button>
        </div>
    </div>
</div>
<script>
    var __Load_Goods_Category__ = "<?php echo U('Goods/loadGoodsCategory');?>";
</script>

<link rel="stylesheet" href="/Public/Admin/jqtree/jqtree.css" />
<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/jqtree/tree.jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>
</body>
</html>