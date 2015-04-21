<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商品回收站展示页</title>
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
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsList');?>">商品列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsAdd');?>">添加商品</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsRecycleBinList');?>">商品回收站</a></li>
    </ul>
</div>

<div class="right">
    <div class="table-responsive container">
        <table class="table table-striped table-bordered">
            <caption>回收站列表</caption>
            <thead>
            <tr>
                <th>
                    <input class="check_all" type="checkbox">
                    <a href="<?php echo U('Goods/goodsRecycleBinList',array('order_by'=>'goods_id','order_sort'=>$order_sort));?>">编号</a>
                </th>
                <th>
                    <a href="<?php echo U('Goods/goodsRecycleBinList',array('order_by'=>'goods_name','order_sort'=>$order_sort));?>"
                       title="点击对列表排序">商品名称</a></th>
                <th><a href="<?php echo U('Goods/goodsRecycleBinList',array('order_by'=>'goods_sn','order_sort'=>$order_sort));?>">货号</a>
                </th>
                <th>
                    <a href="<?php echo U('Goods/goodsRecycleBinList',array('order_by'=>'shop_price','order_sort'=>$order_sort));?>">价格</a>
                </th>
                <th>
                    <a href="<?php echo U('Goods/goodsRecycleBinList',array('order_by'=>'goods_number','order_sort'=>$order_sort));?>">库存</a>
                </th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$goods): ?><tr>
                    <td>
                        <input type="checkbox" name="checkboxes[]" value="<?php echo ($goods["goods_id"]); ?>" readonly="readonly"
                               class="single_check"/>
                        <span><?php echo ($goods["goods_id"]); ?></span>
                    </td>
                    <td class="first-cell">
                        <span><?php echo ($goods["goods_name"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($goods["goods_sn"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($goods["market_price"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($goods["goods_number"]); ?></span>
                    </td>
                    <td>
                        <a href="javascript:;" class="revert_goods" data-id="<?php echo ($goods["goods_id"]); ?>" title="还原">还原</a>
                        <a href="javascript:;" class="del_recycle" data-id="<?php echo ($goods["goods_id"]); ?>" title="彻底删除">彻底删除</a>
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
            <input type="button" id="batch" value="确认" class="btn btn-primary form-control"/>
        </div>
    </div>

</div>
<script>
    var __GOODS_REVERT__ = "<?php echo U('Goods/goodsRevert');?>";
    var __DEL_RECYCLE_URL__ = "<?php echo U('Goods/goodsDelRecycleBin');?>";
    var __BATCH_RECYCLE_URL__ = "<?php echo U('Goods/recycleBatch');?>";

    function message(option) {
        switch (option) {
            case 'restore':
                return "确认要批量从回收站还原商品吗?";
                break;
            case 'delete':
                return "确认要真的批量删除商品?这将造成无法恢复！";
                break;
            default:
                return "";
        }
    }

    $(document).ready(function () {
        //批量编辑商品回收站
        $("#batchedit").click(function () {
            var option = $("#batchsel").val();
            var goods_ids = '';
            $(".single_check").each(function () {
                if ($(this).prop('checked') == true) {
                    goods_ids += $(this).val() + ":";
                }
            });
            if (option == '') {
                alert("你没有选择任何操作");
            } else if (goods_ids == '') {
                alert("你没有选择任何商品");
            } else {
                var comfirm_message = message(option);

                if (confirm(comfirm_message)) {
                    $.ajax({
                        url: __BATCH_RECYCLE_URL__,
                        type: "POST",
                        data: {'goods_ids': goods_ids, 'operation': option},
                        dataType: "html",
                        success: function (data) {
                            if(data!="true"){
                                if(option=="restore"){
                                    alert('批量从回收站恢复商品失败');
                                }else if(option=="delete"){
                                    alert('批量彻底删除商品失败');
                                }
                            }else{
                                if(option=="restore"){
                                    alert('批量从回收站恢复商品成功');
                                }else if(option=="delete"){
                                    alert('批量彻底删除商品成功');
                                }
                                window.location.reload();
                            }

                        }
                    });
                }

            }
        });


        //删除回收站的商品
        $(".del_recycle").click(function () {
            if (confirm("确认真的删除商品吗?这将无法恢复！")) {
                var $this = $(this);
                var goods_id = $(this).attr('data-id');
                $.ajax({
                    url: __DEL_RECYCLE_URL__,
                    type: "POST",
                    data: {'goods_id': goods_id},
                    dataType: "html",
                    success: function (data) {
                        if(data=="true"){
                            alert("从回收站删除商品成功！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert("从回收站删除商品失败！");
                        }
                    }
                });
            }
        });

        //还原回收站的商品
        $(".revert_goods").click(function () {
            if (confirm("确认从回收站恢复商品?")) {
                var $this = $(this);
                var goods_id = $(this).attr('data-id');
                $.ajax({
                    url: __GOODS_REVERT__,
                    type: "POST",
                    data: {'goods_id': goods_id},
                    dataType: "html",
                    success: function (data) {
                        if(data=="true"){
                            alert("从回收站恢复商品成功！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert("从回收站恢复商品失败！");
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