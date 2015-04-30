<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商品展示页</title>
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
                <li><a href="<?php echo U('Coupon/index');?>">兑换券管理</a></li>
                <li><a href="<?php echo U('Store/storeBasicSetting');?>">商店设置</a></li>
                <li><a href="<?php echo U('Store/showGoodsIndex');?>">主页面商品显示设置</a></li>
               
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
        
    </ul>
</div>
<div class="right_content">
    <div class="table-responsive container">
        <table class="table table-striped table-bordered table-hover">
            <caption>所有产品列表</caption>
            <thead>
                <tr>
                    <th>
                        <input class="check_all" type="checkbox">
                        <a href="<?php echo U('Store/showGoodsIndex',array('order_by'=>'goods_id','order_sort'=>$order_sort));?>">编号</a>
                    </th>
                    <th>
                        <a href="<?php echo U('Store/showGoodsIndex',array('order_by'=>'goods_name','order_sort'=>$order_sort));?>" title="点击对列表排序">商品名称</a>
                    </th>
                    <th><a href="<?php echo U('Store/showGoodsIndex',array('order_by'=>'goods_sn','order_sort'=>$order_sort));?>">货号</a></th>
                    <th><a href="<?php echo U('Store/showGoodsIndex',array('order_by'=>'shop_price','order_sort'=>$order_sort));?>">价格</a></th>
                    <th><a href="<?php echo U('Store/showGoodsIndex',array('order_by'=>'is_show_index','order_sort'=>$order_sort));?>">首页是否显示</a></th>
                    <th><a href="<?php echo U('Store/showGoodsIndex',array('order_by'=>'goods_number','order_sort'=>$order_sort));?>" >库存</a></th>
                    <th><a href="javascript:;">操作</a></th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list)): foreach($list as $key=>$goods): ?><tr>
                    <td>
                        <input type="checkbox" name="checkboxes[]" value="<?php echo ($goods["goods_id"]); ?>" class="single_check"/>
                        <span><?php echo ($goods["goods_id"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($goods["goods_name"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($goods["goods_sn"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($goods["market_price"]); ?></span>
                    </td>
                    <td>
                        <input class="is_show_index" type="button" value="<?php if($goods['is_show_index']){echo 'V';}else{echo 'X';} ?>" data-value="<?php echo ($goods["is_show_index"]); ?>" data-id="<?php echo ($goods["goods_id"]); ?>"/>
                    </td>
                    <td>
                        <span><?php echo ($goods["goods_number"]); ?></span>
                    </td>
                    <td>
                        <a href="<?php echo U('Home/Goods/goodsDetail',array('goods_id'=>$goods['goods_id']));?>" target="_blank" title="查看">查看</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <nav class="page_wrapper">
        <ul class="pagination"><?php echo ($page); ?></ul>
    </nav>
</div>
<div class="container">
    <legend>批量操作</legend>
    <div class="form-group">
        <select id="batchsel" class="form-control">
            <option value="">请选择操作</option>
            <option value="show">显示</option>
            <option value="hidden">不显示</option>
        </select>
    </div>
    <input type="button" id="batch"  value="确认" class="btn btn-primary form-control"/>
</div>
</div>
<script>
    var __IS_SHOW_INDEX_URL__ = "<?php echo U('Store/goodsShowOrNot');?>";
    var __BATCH_GOODS_URL__ = "<?php echo U('Store/goodsBatch');?>";
    function message(option)
    {
        switch(option)
        {
            case 'show':
                return "确认要批量显示商品在首页吗？";
                break;
            case 'hidden':
                return "确认要批量不显示商品在首页吗？";
                break;
            default:
                return "";
        }
    }

$(document).ready(function(){
    //批量处理商品显示与否
    $("#batch").click(function(){
        var option = $("#batchsel").val();
        var goods_ids = '';
        $(".single_check").each(function(){
            if($(this).prop('checked')==true){
                goods_ids += $(this).val()+":";
            }
        });
        if(option == ''){
            alert("你没有选择任何操作");
        }else if(goods_ids == ''){
            alert("你没有选择任何商品");
        }else{
            var confirm_message = message(option);
            if(confirm(confirm_message)){
                $.ajax({
                    url: __BATCH_GOODS_URL__,
                    type: "POST",
                    data: { 'goods_ids': goods_ids, 'operation': option},
                    dataType: "html",
                    success: function(data){
                        if(data!="true"){
                                alert("批量修改失败");
                        }else{
                                alert("批量修改成功");
                                window.location.reload();
                        }
                    }
                });
            }
        }
    });    

    //单个商品显示
    $(".is_show_index").click(function(){
        var $this = $(this);
        var is_show_index = $(this).attr('data-value')==0 ? 1 : 0;
        var show_value = $(this).val()=="X" ? "V" : "X";
        $.ajax({
            url: __IS_SHOW_INDEX_URL__,
            type: "POST",
            data: { 'goods_id':$(this).attr('data-id'), 'is_show_index' : is_show_index },
            dataType: "html",
            success: function(data){
                if(data=="true"){
                    if(is_show_index==1){
                        alert("商品已经成功显示在首页");
                    }else{
                        alert("商品已经成功从首页移除");
                    }
                    $this.attr('data-value',is_show_index);
                    $this.val(show_value);
                }else{
                    if(is_show_index==1){
                        alert("操作失败");
                    }else{
                        alert("操作失败");
                    }
                }
            }
        });
    });
});

</script>
<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>