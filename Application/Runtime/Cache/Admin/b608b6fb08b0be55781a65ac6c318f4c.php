<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>订单详情页</title>
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
    <?php if($_SESSION['user_id']!= ''): ?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
    </nav><?php endif; ?>



<div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Order/orderList');?>">订单列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderSearch');?>">订单查询</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderDeliverList');?>">发货单列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderReturnList');?>">退货单列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderPrintTemplate');?>">订单打印模板</a></li>
    </ul>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo U('Order/orderSearchHandle');?>" method="post">
                <table class="table-responsive">
                    <tr>
                        <th>商品名称：</th>
                        <td><input type="text" name="goods_name" /></td>
                        <th>成交开始区间：</th>
                        <td><input type="text" name="add_time_start" id="add_time_start"/></td>
                        <th>成交结束区间：</th>
                        <td><input type="text" name="add_time_end" id="add_time_end"/></td>
                    </tr>
                    <tr>
                        <th>买家昵称：</th>
                        <td><input type="text" name="user_name" /></td>
                        <th>订单状态：</th>
                        <td><input type="text" name="order_status" /></td>
                        <th>评价状态:</th>
                        <td><input type="text" name="comment_status"/></td>
                    </tr>
                    <tr>
                        <th>订单编号:</th>
                        <td><input type="text" name="order_sn"/></td>
                        <th>物流服务:</th>
                        <td><input type="text" name="comment_deliver"/></td>
                        <th>售后服务:</th>
                        <td><input type="text" name="comment_after_sale_service"/></td>
                    </tr>
                </table>


                <table>
                    <tr>
                        <th><input type="submit" value="搜索" class="btn btn-default"></th>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>

<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">

    $("#add_time_start").datetimepicker({
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });
    $("#add_time_end").datetimepicker({
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });
</script>