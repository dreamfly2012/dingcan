<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>评论修改</title>
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
        <li class="list-group-item"><a href="<?php echo U('Comment/commentAdd');?>">添加评论</a></li>
        <li class="list-group-item"><a href="<?php echo U('Comment/commentList');?>">评论列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Comment/commentRecycleBinList');?>">评论回收站</a></li>
    </ul>
</div>

<div class="right_content container">
    <div class="container">
        <h2>评论编辑</h2>
        <form name="form" id="form" enctype="multipart/form-data" action="<?php echo U('Comment/updateComment');?>" method="post" class="form" role="form">
            <div class="form-group">
    <label>评论人：</label>
    <span><input type="text" name="user_name" value="<?php echo ($comment["user_name"]); ?>" class="form-control" /></span>
</div>

<div class="form-group">
    <label>评论商品：</label>
    <select name="goods_id" id="goods_id" class="form-control">
        <?php if(is_array($goods_list)): foreach($goods_list as $key=>$goods): ?><option value="<?php echo ($goods["goods_id"]); ?>" <?php if($goods['goods_id'] == $comment['goods_id']): ?>selected='selected'<?php endif; ?>>
                <?php echo ($goods["goods_name"]); ?>
            </option><?php endforeach; endif; ?>
    </select>
    <a href="<?php echo U('Home/Goods/goodsDetail',array('goods_id'=>$comment['goods_id']));?>" target="_blank"><?php echo (getgoodsnamebyid($comment["goods_id"])); ?></a>
</div>

<div class="form-group">
    <label for="content">评论内容：</label>
    <textarea name="content" id="content" class="form-control"><?php echo ($comment["content"]); ?></textarea>
</div>

<div class="form-group">
    <label for="comment_rank">评论分数：</label>
    <select name="comment_rank" id="comment_rank" class="form-control">
        <?php if(is_array($comment_ranks)): foreach($comment_ranks as $key=>$rank): ?><option value="<?php echo ($rank["value"]); ?>" <?php if($rank['value'] == $comment['comment_rank']): ?>selected='selected'<?php endif; ?>>
                <?php echo ($rank["value"]); ?>
            </option><?php endforeach; endif; ?>
    </select>
</div>

<div class="form-group">
    <input type="hidden" name="comment_id" value="<?php echo ($comment["comment_id"]); ?>">
    <input type="hidden" name="user_id" value="<?php echo ($comment["user_id"]); ?>">
    <input type="submit" value=" 确定 " class="form-control btn btn-primary">
</div>
        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>