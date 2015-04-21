<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>添加会员等级</title>
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
   
  



<div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Member/memberAdd');?>">添加会员</a></li>
        <li class="list-group-item"><a href="<?php echo U('Member/memberList');?>">会员列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Member/memberRank');?>">会员等级</a></li>
    </ul>
</div>

<div class="right">
    <div class="container">
        <h2>添加会员等级</h2>
        <form name="form" id="form" action="<?php echo U('Member/addRank');?>" method="post" class="form" role="form">
            <div class="container">
    <div class="form-group">
        <label for="rank_name">会员等级</label>
        <input type="text" name="rank_name" id="rank_name" value="<?php echo ($rank["rank_name"]); ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label for="level_points">所需积分</label>
        <input type="text" name="level_points" id="level_points" value="<?php echo ($rank["level_points"]); ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label for="discount">享受折扣</label>
        <input type="text" name="discount" id="discount" value="<?php echo ($rank["discount"]); ?>" class="form-control" />
        <p class="help-block">95表示打九五折</p>
    </div>

    <div class="form-group">
        <input type="hidden" name="rank_id" value="<?php echo ($rank["rank_id"]); ?>">
        <input type="submit" value=" 确定 " class="form-control btn btn-success">
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/jqvalidate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/Admin/jqvalidate/messages_zh.min.js"></script>

<script>
    $(document).ready(function(){
        $("#form").validate({
            rules: {
                rank_name: {
                    required: true
                },
                level_points: {
                    required: true
                },
                discount: {
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