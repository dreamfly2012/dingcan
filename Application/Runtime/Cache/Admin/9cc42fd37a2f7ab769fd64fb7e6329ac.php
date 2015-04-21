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
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsList');?>">权限组编辑</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsAdd');?>">添加权限</a></li>
    </ul>
</div>

<div class="right">
    <div class="container">
        <table class="table table-responsive table-bordered">
            <tr>
                <th>角色</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($list)): foreach($list as $key=>$auth_role): ?><tr>
                    <td><?php echo ($auth_role["name"]); ?></td>
                    <td><a href="<?php echo U('Auth/authRoleDelete',array('uid'=>$auth_role['uid'],'group_id'=>$auth_role['group_id']));?>" class="confirm">[删除]</a></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>

</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>

<script>
    $(document).ready(function(){
        $(".confirm").click(function(){
            if(confirm("你真的要从权限列表中删除该用户吗？")){
                return true;
            }else{
                return false;
            }
        });
    });
</script>