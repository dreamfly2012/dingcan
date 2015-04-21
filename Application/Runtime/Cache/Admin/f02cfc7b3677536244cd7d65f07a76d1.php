<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>[<?php echo ($title); ?>]</title>
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
        <li class="list-group-item"><a href="<?php echo U('Address/addressList',array('type'=>'deliver'));?>">发货地址管理</a></li>
        <li class="list-group-item"><a href="<?php echo U('Address/addressList',array('type'=>'refund'));?>">退货地址管理</a></li>
    </ul>
</div>

<div class="right_content table-responsive">
    <table class="table table-striped table-bordered table_show">
        <caption><?php echo ($title); ?></caption>
        <thead>
        <tr>
            <th>
                <a href="<?php echo U('address/addressList',array('type'=>$type,'order_by'=>'address_id','order_sort'=>$order_sort));?>">编号</a>
            </th>
            <th>
                <a href="<?php echo U('address/addressList',array('type'=>$type,'order_by'=>'address_name','order_sort'=>$order_sort));?>">地址</a>
            </th>
            <th>
                <a href="<?php echo U('address/addressList',array('type'=>$type,'order_by'=>'consignee','order_sort'=>$order_sort));?>">联系人</a>
            </th>
            <th>
                <a href="<?php echo U('address/addressList',array('type'=>$type,'order_by'=>'telephone','order_sort'=>$order_sort));?>">电话</a></th>
            <th><a href="<?php echo U('address/addressList',array('type'=>$type,'order_by'=>'postcode','order_sort'=>$order_sort));?>">邮政骗码</a></th>
            <th><a href="javascript:;">操作</a></th>
        </tr>
        </thead>

        <tbody>

        <?php if(is_array($list)): foreach($list as $key=>$address): ?><tr>
                <td>
                    <span><?php echo ($address["address_id"]); ?></span>
                </td>
                <td class="first-cell">
                    <input type="text" readonly="readonly" name="address_name" value="<?php echo ($address["address_name"]); ?>"/>
                </td>
                <td>
                    <input type="text" readonly="readonly" name="consignee" value="<?php echo ($address["consignee"]); ?>"/>
                </td>
                <td align="right">
                    <input type="text" readonly="readonly" name="telephone" value="<?php echo ($address["telephone"]); ?>"/>
                </td>
                <td>
                    <input type="text" readonly="readonly" name="postcode" value="<?php echo ($address["postcode"]); ?>" />
                </td>
                <td align="center">
                    <a href="<?php echo U('Address/addressEdit',array('address_id'=>$address['address_id'],'type'=>$type));?>" title="编辑">编辑</a>
                    <a href="javascript:;" class="delete_address" data-id="<?php echo ($address["address_id"]); ?>" title="彻底删除">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>

    <div class="page_wrapper">
        <ul class="pagination"><?php echo ($page); ?></ul>
    </div>
</div>
<style>
    .table_show {
        padding-right: 30px;
        border: 1px gery solid;
        width: 90%;
        font-color: #fff;
    }
</style>


<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>