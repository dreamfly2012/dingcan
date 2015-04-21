<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>品牌列表</title>
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
        <li class="list-group-item"><a href="<?php echo U('Brand/brandAdd');?>">品牌添加</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandList');?>">品牌列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandRecycleBinList');?>">品牌回收站</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="table-responsive container">
        <table class="table table-striped table-bordered">
            <caption>品牌列表</caption>
            <thead>
            <tr>
                <th>
                    <input class="check_all" type="checkbox">
                    <a href="<?php echo U('Brand/brandList',array('order_by'=>'brand_id','order_sort'=>$order_sort));?>" title="点击排序">编号</a>
                </th>
                <th>
                    <a href="<?php echo U('Brand/brandList',array('order_by'=>'brand_name','order_sort'=>$order_sort));?>" title="点击排序">品牌名称</a></th>
                <th><a href="<?php echo U('Brand/brandList',array('order_by'=>'brand_logo','order_sort'=>$order_sort));?>" title="点击排序">品牌logo</a></th>
                <th><a href="<?php echo U('Brand/brandList',array('order_by'=>'brand_desc','order_sort'=>$order_sort));?>" title="点击排序">品牌描述</a></th>
                <th><a href="<?php echo U('Brand/brandList',array('order_by'=>'site_url','order_sort'=>$order_sort));?>" title="点击排序">品牌网址</a></th>
                <th><a href="<?php echo U('Brand/brandList',array('order_by'=>'sort_order','order_sort'=>$order_sort));?>" title="点击排序">排序</a></th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$brand): ?><tr>
                    <td>
                        <input type="checkbox" name="checkboxes[]" value="<?php echo ($brand["brand_id"]); ?>" class="single_check"/>
                        <span><?php echo ($brand["brand_id"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($brand["brand_name"]); ?></span>
                    </td>
                    <td>
                        <img src="/Uploads/<?php echo ($brand["brand_logo"]); ?>" width="50" height="50" alt="logo"/>
                    </td>
                    <td>
                        <textarea class="form-control"><?php echo ($brand["brand_desc"]); ?></textarea>
                    </td>
                    <td>
                        <span><?php echo ($brand["site_url"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($brand["sort_order"]); ?></span>
                    </td>

                    <td>
                        <a href="<?php echo U('Brand/brandEdit',array('brand_id'=>$brand['brand_id']));?>" title="编辑">编辑</a>
                        <a href="javascript:;" class="del_brand" data-id="<?php echo ($brand["brand_id"]); ?>" title="回收站">删除</a>
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
                <option	value="recycle">删除到回收站</option>
            </select>
        </div>
        <div class="form-group">
            <input type="button" id="batch" value="确认" class="btn btn-primary form-control" />
        </div>
    </div>


</div>
<script>

    var __DEL_BRAND_URL__ = "<?php echo U('Brand/brandRecycleBin');?>";
    var __BATCH_BRAND_URL__ = "<?php echo U('Brand/brandBatch');?>";

    var message_confirm_batch_recycle = "确认要批量删除品牌到回收站吗？";
    var message_no_select_operation ="你没有选择任何操作";
    var message_no_select_brand = "你没有选择任何品牌";
    var message_update_success = "批量修改成功";


    function message(option)
    {
        switch(option)
        {
            case 'recycle':
                return message_confirm_batch_recycle;
                break;
            default:
                return "";
        }
    }

    $(document).ready(function(){
        //品牌删除
        $(".del_brand").click(function() {
            if (confirm("确认删除品牌到回收站吗?")) {
                var $this = $(this);
                var brand_id = $(this).attr('data-id');
                $.ajax({
                    url: __DEL_BRAND_URL__,
                    type: "POST",
                    data: {'brand_id': brand_id},
                    dataType: "html",
                    success: function (data) {
                        if(data=="true"){
                            alert("删除品牌成功！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert("删除品牌失败！");
                        }

                    }
                });
            }
        });


        //品牌批量编辑
        $("#batch").click(function(){
            var option = $("#batchsel").val();
            var brand_ids = '';
            $("[name='checkboxes[]']:checkbox").each(function(){
                if($(this).prop('checked')==true){
                    brand_ids += $(this).val()+":";
                }
            });
            if(option == ''){
                alert(message_no_select_operation);
            }else if(brand_ids == ''){
                alert(message_no_select_brand);
            }else{
                var comfirm_message = message(option);

                if(confirm(comfirm_message)){
                    $.ajax({
                        url: __BATCH_BRAND_URL__,
                        type: "POST",
                        data: { 'brand_ids': brand_ids, 'operation': option},
                        dataType: "html",
                        success: function(data){
                            // TODO: 没有对返回结果进行判读
                            alert(message_update_success);
                            window.location.reload();
                        }
                    });
                }
            }
        });
    });


</script>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>