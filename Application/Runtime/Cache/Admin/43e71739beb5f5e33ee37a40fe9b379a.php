<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商品sku修改</title>
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

<div class="right">
    <form action="<?php echo U('Goods/goodsSkuEdit');?>" method="post">
	<div class="container">
        <table class="table-striped table table-bordered">
            <caption>商品sku修改</caption>
            <thead>
                <tr>
                    <th>sku属性</th>
                    <th>sku值</th>
                    <th>价格</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="attr_id[]" value="" /></td>
                    <td><input type="text" name="attr_value[]" value="" /></td>
                    <td><input type="text" name="attr_price[]" value="" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="attr_id[]" value="" /></td>
                    <td><input type="text" name="attr_value[]" value="" /></td>
                    <td><input type="text" name="attr_price[]" value="" /></td>
                </tr>
                <tr>
                    <td id="add_sku">[+]增加属性</td>
                    <td></td>
                    <td id="remove_sku">[-]移除属性</td>
                </tr>
            </tbody>
        </table>
        <div class="input-group">
            <input type="submit" value="确认提交" class="btn btn-default"/>
        </div>
	</div>
    </form>
</div>

<link rel="stylesheet" href="/Public/Admin/jqtree/jqtree.css" />
<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/jqtree/tree.jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>
</body>
</html>