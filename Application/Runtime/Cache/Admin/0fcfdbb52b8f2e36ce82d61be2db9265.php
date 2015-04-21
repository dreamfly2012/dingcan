<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>品牌添加</title>
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
   
  



<div class="left_content">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Brand/brandAdd');?>">品牌添加</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandList');?>">品牌列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandRecycleBinList');?>">品牌回收站</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="container">
        <h2>品牌添加</h2>
        <form name="form" id="form" enctype="multipart/form-data" action="<?php echo U('Brand/addBrand');?>" method="post" class="form" role="form">
            <div class="container">
    <div class="form-group">
        <label for="brand_name">品牌名称</label>
        <input type="text" name="brand_name" id="brand_name" value="<?php echo ($brand["brand_name"]); ?>" class="form-control" placeholder="品牌名称">
    </div>
    <div class="form-group">
        <label for="brand_logo">品牌logo</label>
        <?php if($brand["brand_logo"] == ''): ?><input type="file" name="brand_logo" id="brand_logo" class="form-control" />
            <p class="help-block">图片未上传</p>
        <?php else: ?>
            <img src="/Uploads/<?php echo ($brand["brand_logo"]); ?>" width="50" height="50" alt="logo"/>
            <input type="file" name="brand_logo" id="brand_logo" class="form-control" />
            <p class="help-block">重新上传将删除源文件</p><?php endif; ?>
    </div>
    <div class="form-group">
        <label for="brand_desc">品牌描述</label>
        <input type="text" name="brand_desc" id="brand_desc" value="<?php echo ($brand["brand_desc"]); ?>" class="form-control" placeholder="品牌描述" />
    </div>
    <div class="form-group">
        <label for="site_url">品牌网址</label>
        <input type="text" name="site_url" id="site_url" value="<?php echo ($brand["site_url"]); ?>" class="form-control" placeholder="品牌网址"/>
    </div>
    <div class="form-group">
        <label for="sort_order">品牌排序</label>
        <input type="text" name="sort_order" id="sort_order" value="<?php echo ($brand["sort_order"]); ?>" class="form-control" placeholder="品牌排序"/>
    </div>
    <div class="form-group">
        <input type="hidden" name="brand_id" value="<?php echo ($brand["brand_id"]); ?>">
        <input type="submit" value=" 确定 " class="form-control btn btn-primary">
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/jqvalidate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/Admin/jqvalidate/messages_zh.min.js"></script>

<script>
    $(document).ready(function(){
        $("#form").validate({
            rules: {
                brand_name: {
                    required: true
                }
            }
        });
    });
</script>
        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>