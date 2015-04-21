<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商店显示信息</title>
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
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
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
        <li class="list-group-item"><a href="<?php echo U('Store/storeBasicSetting');?>">基本信息</a></li>
        <li class="list-group-item"><a href="<?php echo U('Store/storeDisplaySetting');?>">显示设置</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="container">
        <h2>商店显示信息</h2>
        <form action="<?php echo U('Store/storeDisplaySettingHandle');?>" method="post" class="form" role="form">
            <div class="form-group">
                <label for="store_logo">商店logo</label>
                <?php if($store["store_logo"] == ''): ?><input type="file" name="store_logo" id="store_logo"  class="form-control">
                <?php else: ?>
                    <img src="/Uploads/<?php echo ($store["store_logo"]); ?>" width="50" height="50"/>
                    <input type="file" name="store_logo" id="store_logo"  class="form-control">
                    <p class="help-block">重新上传将删除原logo</p><?php endif; ?>
            </div>

            <div class="form-group">
                <label for="store_banner">商店banner</label>
                <?php if($store["store_banner"] == ''): ?><input type="file" name="store_banner" id="store_banner"  class="form-control">
                <?php else: ?>
                    <img src="/Uploads/<?php echo ($store["store_banner"]); ?>" width="50" height="50"/>
                    <input type="file" name="store_banner" id="store_banner"  class="form-control">
                    <p class="help-block">重新上传将删除原banner</p><?php endif; ?>
            </div>

            <div class="form-group">
                <label for="category_sort_method">商品分类页默认排序方式</label>
                <select name="category_ort_method" id="category_sort_method" class="form-control">
                    <option value="on_shelves" selected="selected">上架时间</option>
                    <option value="price">商品价格</option>
                    <option value="update_time">商品更新时间</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title_length">
                    商品title长度设置
                </label>
                <input type="text" name="title_length" id="title_length" value="<?php echo ($store["title_length"]); ?>" class="form-control"/>
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