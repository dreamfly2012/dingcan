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
        <li class="list-group-item"><a href="<?php echo U('Auth/authAddRule');?>">添加权限规则</a></li>
    </ul>
</div>

<div class="right">
    <div class="container">
        <form action="<?php echo U('Auth/authGroupRuleEdit');?>" method="post" class="form" role="form">
            <div class="form-group">
                <label>权限管理</label>
            </div>

            <?php if(is_array($list)): foreach($list as $key=>$auth_group_rule): ?><div class="checkbox">
                <label>
                    <input type="checkbox" name="auth_rule_id[]" <?php if($auth_group_rule["checked"] == true): ?>checked="checked"<?php endif; ?> value="<?php echo ($auth_group_rule["id"]); ?>"> <?php echo ($auth_group_rule["title"]); ?>
                </label>
            </div><?php endforeach; endif; ?>
            <div class="form-group">
                <a id="checkall" class="btn btn-default" href="javascript:;">全选</a>
                <a id="checknone" class="btn btn-default" href="javascript:;">取消全选</a>
            </div>
            <input type="hidden" name="auth_group_id" value="<?php echo ($auth_group_id); ?>" />
            <button type="submit" class="btn btn-default">Submit</button>

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