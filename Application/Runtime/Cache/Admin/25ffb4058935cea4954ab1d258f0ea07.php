<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>品牌回收站展示页</title>
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
                <li><a href="<?php echo U('User/userList');?>">会员管理</a></li>
                <li><a href="<?php echo U('Store/storeSetting');?>">商店设置</a></li>
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Login/logout');?>">注销</a></li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            </ul>
        </div>
    </nav>
    <?php endif; ?>
   
  



<div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Brand/brandAdd');?>">品牌添加</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandList');?>">品牌列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandRecycleBinList');?>">品牌回收站</a></li>
    </ul>
</div>

<div class="right">
    <div class="table-responsive container">
        <table class="table table-striped table-bordered">
            <caption>品牌回收站</caption>
            <thead>
            <tr>
                <th>
                    <input class="check_all" type="checkbox">
                    <a href="<?php echo U('Brand/brandRecycleBinList',array('order_by'=>'brand_id','order_sort'=>$order_sort));?>">编号</a>
                </th>
                <th>
                    <a href="<?php echo U('Brand/brandRecycleBinList',array('order_by'=>'brand_name','order_sort'=>$order_sort));?>" title="点击对列表排序">品牌名称</a></th>
                <th><a href="<?php echo U('Brand/brandRecycleBinList',array('order_by'=>'brand_logo','order_sort'=>$order_sort));?>">品牌logo</a></th>
                <th><a href="<?php echo U('Brand/brandRecycleBinList',array('order_by'=>'brand_desc','order_sort'=>$order_sort));?>">品牌描述</a></th>
                <th><a href="<?php echo U('Brand/brandRecycleBinList',array('order_by'=>'site_url','order_sort'=>$order_sort));?>">品牌网址</a></th>
                <th><a href="<?php echo U('Brand/brandRecycleBinList',array('order_by'=>'sort_order','order_sort'=>$order_sort));?>" >排序</a></th>
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
                        <a href="javascript:;" class="revert_brand" data-id="<?php echo ($brand["brand_id"]); ?>" title="还原">还原</a>
                        <a href="javascript:;" class="del_brand" data-id="<?php echo ($brand["brand_id"]); ?>" title="彻底删除">彻底删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="page_wrapper"><ul class="pagination"><?php echo ($page); ?></ul></div>
    </div>

    <div class="container">
        <legend>批量操作</legend>
        <div class="form-group">
            <select class="form-control" id="batchsel">
                <option value="">请选择操作</option>
                <option value="restore">还原</option>
                <option value="delete">彻底删除</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" id="batch" value="确认" class="btn btn-primary form-control">
        </div>
    </div>

</div>
<script>
    var __BRAND_REVERT__ = "<?php echo U('Brand/brandRevert');?>";
    var __DEL_RECYCLE_URL__ = "<?php echo U('Brand/brandDelRecycleBin');?>";
    var __BATCH_RECYCLE_URL__ = "<?php echo U('Brand/recycleBatch');?>";

    function message(option)
    {
        switch(option)
        {
            case 'restore':
                return "确认要批量从回收站还原品牌吗？";
                break;
            case 'delete':
                return "确认要真的批量删除品牌？将不能恢复了！";
                break;
            default:
                return "";
        }
    }


    $(document).ready(function(){
        //品牌回收站批量编辑
        $("#batch").click(function(){
            var option = $("#batchsel").val();
            var brand_ids = '';
            $(".single_check").each(function(){
                if($(this).prop('checked')==true){
                    brand_ids += $(this).val()+":";
                }
            });
            if(option == ''){
                alert("你没有选择任何操作!");
            }else if(brand_ids == ''){
                alert("你没有选择任何品牌!");
            }else{
                var confirm_message = message(option);
                if(confirm(confirm_message)){
                    $.ajax({
                        url: __BATCH_RECYCLE_URL__,
                        type: "POST",
                        data: { 'brand_ids': brand_ids, 'operation': option},
                        dataType: "html",
                        success: function(data){
                            if(data=="true"){
                                if(option=="restore"){
                                    alert("批量还原品牌成功！");
                                }else if(option=="delete"){
                                    alert("批量删除品牌成功！");
                                }
                                window.location.reload();
                            }else{
                                if(option=="restore"){
                                    alert("批量还原品牌失败！");
                                }else if(option=="delete"){
                                    alert("批量删除品牌失败！");
                                }
                            }
                        }
                    });
                }
            }
        });


        //删除回收站的品牌
        $(".del_brand").click(function(){
            if(confirm("确认删除品牌?将无法恢复!")){
                var $this = $(this);
                var brand_id = $(this).attr('data-id');
                $.ajax({
                    url: __DEL_RECYCLE_URL__,
                    type: "POST",
                    data: {'brand_id':brand_id},
                    dataType: "html",
                    success: function(data){
                        if(data=="true"){
                            alert("删除品牌成功！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                           alert("删除品牌失败");
                        }
                    }
                });
            }
        });

        //还原回收站的品牌
        $(".revert_brand").click(function(){
            if(confirm("确认从回收站恢复品牌?")){
                var $this = $(this);
                var brand_id = $(this).attr('data-id');
                $.ajax({
                    url: __BRAND_REVERT__,
                    type: "POST",
                    data: {'brand_id':brand_id},
                    dataType: "html",
                    success: function(data){
                        if(data=="true"){
                            alert("成功从回收站还原品牌！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert("还原品牌失败！");
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