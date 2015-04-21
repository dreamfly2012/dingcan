<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>会员添加</title>
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
        <li class="list-group-item"><a href="<?php echo U('Member/memberAdd');?>">添加会员</a></li>
        <li class="list-group-item"><a href="<?php echo U('Member/memberList');?>">会员列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Member/memberRank');?>">会员等级</a></li>
    </ul>
</div>

<div class="right_content">
    <?php if($is_search): ?>
    <div class="container">
        <h2>会员添加</h2>
        <form name="form" id="form" action="<?php echo U('Member/searchUser');?>" method="post" class="form" role="form">
            <div class="container">
                <div class="form-group">
                    <label for="email">
                        用户Email
                    </label>
                    <input type="text" name="email" id="email" value="" class="form-control" placeholder="用户email"/>
                </div>

                <div class="form-group">
                    <label for="user_name">
                        用户名称
                    </label>
                    <input type="text" name="user_name" id="user_name" value="" class="form-control" placeholder="用户名称"/>
                </div>

                <div class="form-group">
                    <input type="submit" value=" 检索 " class="form-control btn btn-primary">
                </div>

            </div>
        </form>
    </div>
    <?php else: ?>
    <div class="container">
        <h2>会员添加</h2>
        <form name="form" id="form" action="<?php echo U('Member/addMember');?>" method="post" class="form" role="form">
            <div class="container">
                <div class="form-group">
                    <label>用户名：</label>
                    <span class="form-control"><?php echo ($user["user_name"]); ?></span>
                </div>

                <div class="form-group">
                    <label>邮箱：</label>
                    <span class="form-control"><?php echo ($user["email"]); ?></span>
                </div>

                <div class="form-group">
                    <label for="rank">
                        会员等级
                    </label>
                    <select name="rank" id="rank" class="form-control">
                        <?php if(is_array($rank)): foreach($rank as $key=>$rank): ?><option value="<?php echo ($rank["rank_id"]); ?>"><?php echo ($rank["rank_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                    <p class="help-block">会员等级从左侧导航添加</p>
                </div>

                <div class="form-group">
                    <label for="score">
                        会员积分
                    </label>
                    <input type="text" name="score" id="score" value="0" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo ($user["user_id"]); ?>" />
                    <input type="submit" value=" 确认添加 " class="form-control btn btn-primary">
                </div>

            </div>
        </form>
    </div>
    <?php endif; ?>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>