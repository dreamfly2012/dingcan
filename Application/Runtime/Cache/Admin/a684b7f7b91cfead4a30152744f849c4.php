<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>权限管理</title>
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
        <li class="list-group-item"><a href="<?php echo U('Auth/authAddARule');?>">添加权限规则</a></li>
    </ul>
</div>

<div class="right">
    <div class="container">
        <h2><a href="<?php echo U('Auth/authAddGroup');?>" class="btn-default btn">添加权限组</a></h2>
        <table class="table table-responsive table-bordered">
            <tr>
               <th>权限组</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($auth_group)): foreach($auth_group as $key=>$auth_group): ?><tr>
                <td><?php echo ($auth_group["title"]); ?></td>
                <td><a href="<?php echo U('Auth/authRules',array('id'=>$auth_group['id']));?>">[权限]</a><a href="<?php echo U('Auth/authRole',array('id'=>$auth_group['id']));?>">[成员]</a></td>
            </tr><?php endforeach; endif; ?>
        </table>
    </div>

</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>