<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商品推荐设置</title>
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
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsRecycleBinList');?>">商品回收站</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsRecommend');?>">商品加入推荐设置</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsSku');?>">商品sku</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsSku');?>">商品相册</a></li>

    </ul>
</div>

<div class="right">
	<form role="form" enctype="multipart/form-data" action="<?php echo U('Goods/goodsHandelRecommend');?>" method="post" name="theForm">
		<div class="container">
			<div class="col-md-12">
	            <label>精品:</label>
	            <div class="input-group">
	                <span class="input-group-addon">
	                    加入精品请勾选 
	                </span>
	                <input class="form-control" type="checkbox" name="is_best" value="<?php echo ($goods["is_best"]); ?>" checked="checked"> 
	            </div>
	        </div>
	        <div class="col-md-12">    
	            <label>新品:</label>
	            <div class="input-group">
	                <span class="input-group-addon">
	                    加入新品请勾选 
	                </span>
	                <input class="form-control" type="checkbox" name="is_new" value="<?php echo ($goods["is_new"]); ?>" checked="checked">
	            </div>
	        </div>
	        <div class="col-md-12">       
	            <label>热销</label> 
	            <div class="input-group">   
	                <span class="input-group-addon">
	                    加入热销请勾选
	                </span>
	                <input class="form-control" type="checkbox" name="is_hot" value="<?php echo ($goods["is_hot"]); ?>" <?php  ?>  />
	            </div>
	        </div>    
	        <div class="col-md-12">
	            <label for="is_shipping">是否免运费</label>
	            <div class="input-group">
	                <span class="input-group-addon">
	                    免运费请勾选
	                </span>
	                <input type="checkbox" class="form-control" id="is_shipping" name="is_shipping" value="<?php echo ($goods["is_shipping"]); ?>"> 
	            </div>
	        </div>
	    </div>
	</form>
</div>

<link rel="stylesheet" href="/Public/Admin/jstree/jqtree.css" />
<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/jstree/tree.jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>
</body>
</html>