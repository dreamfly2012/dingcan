<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>广告列表</title>
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
        <li class="list-group-item"><a href="<?php echo U('Ad/adAdd');?>">添加广告</a></li>
        <li class="list-group-item"><a href="<?php echo U('Ad/adList');?>">广告列表</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="table-responsive container">

        <table class="table table-striped table-bordered table-condensed">
            <caption>广告列表</caption>
            <thead>
                <tr>
                    <th>
                        <input class="checkall" type="checkbox">
                        <a href="<?php echo U('Ad/adList',array('order_by'=>'ad_id','order_sort'=>$order_sort));?>">广告id</a>
                    </th>
                    <th>
                        <a href="<?php echo U('Ad/adList',array('order_by'=>'ad_name','order_sort'=>$order_sort));?>">广告名称</a>
                    </th>
                    <th><a href="<?php echo U('Ad/adList',array('order_by'=>'ad_link','order_sort'=>$order_sort));?>">广告链接</a></th>
                    <th><a href="<?php echo U('Ad/adList',array('order_by'=>'ad_code','order_sort'=>$order_sort));?>">广告代码</a></th>
                    <th><a href="<?php echo U('Ad/adList',array('order_by'=>'ad_img','order_sort'=>$order_sort));?>">广告图片</a></th>
                    <th><a href="<?php echo U('Ad/adList',array('order_by'=>'start_time','order_sort'=>$order_sort));?>" >广告开始时间</a></th>
                    <th><a href="<?php echo U('Ad/adList',array('order_by'=>'end_time','order_sort'=>$order_sort));?>" >广告结束时间</a></th>
                    <th><a href="javascript:;">操作</a></th>
                </tr>
            </thead>
            <tbody>

            <?php if(is_array($list)): foreach($list as $key=>$ad): ?><tr>
                    <td>
                        <input type="checkbox" name="checkboxes[]" value="<?php echo ($ad["ad_id"]); ?>" class="single_check"/>
                        <span><?php echo ($ad["ad_id"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($ad["ad_name"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($ad["ad_link"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($ad["ad_code"]); ?>"</span>
                    </td>
                    <td>
                       <img src="/Uploads/<?php echo ($ad["ad_img"]); ?>" width="50" height="50" alt="广告图片"/>
                    </td>
                    <td>
                        <span><?php echo (now_date($ad["start_time"])); ?></span>
                    </td>
                    <td>
                        <span><?php echo (now_date($ad["end_time"])); ?></span>
                    </td>

                    <td>
                        <a href="<?php echo U('Ad/adEdit',array('ad_id'=>$ad['ad_id']));?>" title="编辑">编辑</a>
                        <a href="javascript:;" class="del_ad" data-id="<?php echo ($ad["ad_id"]); ?>" title="回收站">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="page_wrapper"><ul class="pagination"><?php echo ($page); ?></ul></div>
    </div>

    <div class="container">
        <legend>批量操作</legend>
        <div class="form-group">
            <select class="form-control" id="batchsel" class="form-control">
                <option value="">请选择操作</option>
                <option	value="recycle">删除到回收站</option>
                <!--TODO: 其他的功能后续添加-->
            </select>
        </div>
        <input type="button" id="batch" value="确认" class="btn btn-primary form-control"/>
    </div>
</div>


<script>
    var __IS_ON_SALE_URL__ = "<?php echo U('Goods/goodsOnsaleORNot');?>"; 
    var __DEL_GOODS_URL__ = "<?php echo U('Goods/goodsRecycleBin');?>";
    var __Batch_AD_URL__ = "<?php echo U('Ad/adBatch');?>";

    var message_confirm_del = '确认删除广告到回收站吗？';
    var message_confirm_batch_recycle = "确认要批量删除广告到回收站吗？";
    var message_no_select_operation ="你没有选择任何操作";
    var message_no_select_ads = "你没有选择任何广告";
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

		//批量操作
		$("#batch").click(function(){
			var option = $("#batchsel").val();
			var ad_ids = '';
			$(".single_check").each(function(){
				if($(this).prop('checked')==true){
					ad_ids += $(this).val()+":";
				}
			});
			if(option == ''){
				alert(message_no_select_operation);
			}else if(goods_ids == ''){
				alert(message_no_select_ads);
			}else{
                var confirm_message = message(option);

                if(confirm(confirm_message)){
                    $.ajax({
                        url: __Batch_AD_URL__,
                        type: "POST",
                        data: { 'ad_ids': goods_ids, 'operation': option},
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

		//商品删除
	    $(".del_ad").click(function(){
	        if(confirm(message_confirm_del)){
	            var $this = $(this);
	            var goods_id = $(this).attr('data-id');
	            $.ajax({
	                url: __DEL_GOODS_URL__,
	                type: "POST",
	                data: {'goods_id':goods_id},
	                dataType: "html",
	                success: function(data){   
	                    $this.parent('td').parent('tr').remove();
	                }
	            });
	        }
	    });
    

    });
</script>
<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>