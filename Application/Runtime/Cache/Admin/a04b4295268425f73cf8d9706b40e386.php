<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>兑换券列表</title>
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
        <li class="list-group-item"><a href="<?php echo U('Coupon/couponAdd');?>">添加兑换券</a></li>
        <li class="list-group-item"><a href="<?php echo U('Coupon/couponList');?>">兑换券列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Coupon/couponRecycleBinList');?>">兑换券回收站</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="table-responsive container">
        <table class="table table-striped table-bordered">
            <caption>兑换券回收站列表</caption>
            <thead>
            <tr>
                <th>
                    <input class="check_all" type="checkbox">
                    <a href="<?php echo U('Coupon/couponList',array('order_by'=>'id','order_sort'=>$order_sort));?>" title="点击排序">编号</a>
                </th>
                <th>
                    <a href="<?php echo U('Coupon/couponList',array('order_by'=>'name','order_sort'=>$order_sort));?>" title="点击排序">兑换券名称</a></th>
                <th><a href="<?php echo U('Coupon/couponList',array('order_by'=>'pay_points','order_sort'=>$order_sort));?>" title="点击排序">面值</a></th>
                <th><a href="<?php echo U('Coupon/couponList',array('order_by'=>'coupon_code','order_sort'=>$order_sort));?>" title="点击排序">兑换码</a></th>
                <th><a href="<?php echo U('Coupon/couponList',array('order_by'=>'validate_date','order_sort'=>$order_sort));?>" title="点击排序">有效期</a></th>
                <th><a href="<?php echo U('Coupon/couponList',array('order_by'=>'status','order_sort'=>$order_sort));?>" title="点击排序">可用状态</a></th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$coupon): ?><tr>
                    <td>
                        <input type="checkbox" name="checkboxes[]" value="<?php echo ($coupon["id"]); ?>" class="single_check"/>
                        <span><?php echo ($coupon["id"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($coupon["name"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($coupon["pay_points"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($coupon["coupon_code"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo (date('Y-m-d H:i:s',$coupon["validate_date"])); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($coupon["status"]); ?></span>
                    </td>

                    <td>
                        <a href="javascript:;" class="revert_coupon" data-id="<?php echo ($coupon["id"]); ?>" title="还原">还原</a>
                        <a href="javascript:;" class="del_coupon" data-id="<?php echo ($coupon["id"]); ?>" title="彻底删除">彻底删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>

        <div class="page_wrapper">
            <ul class="pagination"><?php echo ($page); ?></ul>
        </div>
    </div>

    <div class="container">
        <legend>批量操作</legend>
        <div class="form-group">
            <select id="batchsel" class="form-control">
                <option value="">请选择操作</option>
                <option value="restore">还原</option>
                <option value="delete">彻底删除</option>
            </select>
        </div>
        <div class="form-group">
            <input type="button" id="batch" value="确认" class="btn btn-primary form-control" />
        </div>
    </div>


</div>
<script>

    var __COUPON_REVERT__ = "<?php echo U('Coupon/couponRevert');?>";
    var __DEL_RECYCLE_URL__ = "<?php echo U('Coupon/couponDelRecycleBin');?>";
    var __BATCH_RECYCLE_URL__ = "<?php echo U('Coupon/recycleBatch');?>";

    function message(option)
    {
        switch(option)
        {
            case 'restore':
                return "确认要批量从回收站还原兑换券吗？";
                break;
            case 'delete':
                return "确认要真的批量删除兑换券？将不能恢复了！";
                break;
            default:
                return "";
        }
    }


    $(document).ready(function(){
        //回收站批量编辑
        $("#batch").click(function(){
            var option = $("#batchsel").val();
            var ids = '';
            $(".single_check").each(function(){
                if($(this).prop('checked')==true){
                    ids += $(this).val()+":";
                }
            });
            if(option == ''){
                alert("你没有选择任何操作!");
            }else if(ids == ''){
                alert("你没有选择任何兑换券!");
            }else{
                var confirm_message = message(option);
                if(confirm(confirm_message)){
                    $.ajax({
                        url: __BATCH_RECYCLE_URL__,
                        type: "POST",
                        data: { 'ids': ids, 'operation': option},
                        dataType: "html",
                        success: function(data){
                            if(data=="true"){
                                if(option=="restore"){
                                    alert("批量还原兑换券成功！");
                                }else if(option=="delete"){
                                    alert("批量删除兑换券成功！");
                                }
                                window.location.reload();
                            }else{
                                if(option=="restore"){
                                    alert("批量还原兑换券失败！");
                                }else if(option=="delete"){
                                    alert("批量删除兑换券失败！");
                                }
                            }
                        }
                    });
                }
            }
        });


        //删除
        $(".del_coupon").click(function(){
            if(confirm("确认删除兑换券?将无法恢复!")){
                var $this = $(this);
                var id = $(this).attr('data-id');
                $.ajax({
                    url: __DEL_RECYCLE_URL__,
                    type: "POST",
                    data: {'id':id},
                    dataType: "html",
                    success: function(data){
                        if(data=="true"){
                            alert("删除兑换券成功！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert("删除兑换券失败");
                        }
                    }
                });
            }
        });

        //还原
        $(".revert_coupon").click(function(){
            if(confirm("确认从回收站恢复兑换券吗?")){
                var $this = $(this);
                var id = $(this).attr('data-id');
                $.ajax({
                    url: __COUPON_REVERT__,
                    type: "POST",
                    data: {'id':id},
                    dataType: "html",
                    success: function(data){
                        if(data=="true"){
                            alert("成功从回收站还原兑换券！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert("还原兑换券失败！");
                        }
                    }
                });
            }
        });
    });
</script>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>