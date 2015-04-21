<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>添加权限规则</title>
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
    </nav>
  



<div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Auth/authManage');?>">权限组编辑</a></li>
        <li class="list-group-item"><a href="<?php echo U('Auth/authAddRule');?>">添加权限规则</a></li>
    </ul>
</div>

<div class="right">
    <div class="container">
        <h1>添加权限规则</h1>
        <form role="form" class="form" method="post" action="<?php echo U('Auth/authAddGroupHandle');?>">
            <div class="form-group">
                <label for="title">权限名称</label>
                <input type="text" id="title" name="title" class="form-control"  placeholder="权限名称">
            </div>
            <div class="form-group">
                <label for="name">权限规则</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="权限规则">
            </div>
            <div class="form-group">
                <a id="checkall" class="btn btn-default" href="javascript:;">全选</a>
                <a id="checknone" class="btn btn-default" href="javascript:;">取消全选</a>
            </div>

            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>

</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#checkall").click(function(){
            $("input[name='auth_rule_id[]']").prop('checked',true);
        });
        $("#checknone").click(function(){
            $("input[name='auth_rule_id[]']").prop('checked',false);
        });
    });
</script>