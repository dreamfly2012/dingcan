<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/dist/css/common.css">
    <script type="text/javascript" src="/Public/Admin/dist/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">巨搜Shop</a>
        </div>
    </nav>



<div class="left">
    <ul class="list-group">
        <li class="list-group-item"><a href="">商品列表</a></li>
        <li class="list-group-item"><a href="">添加商品</a></li>
        <li class="list-group-item"><a href="">商品类型</a></li>
        <li class="list-group-item"><a href="">商品分类</a></li>
    </ul>
</div>

<div class="right">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>
                <input class="checkall" type="checkbox">
                <a href="<?php echo U('Goods/goodsList',array('order_by'=>'goods_id','order_sort'=>$order_sort));?>">编号</a></th>
            <th><a href="<?php echo U('Goods/goodsList',array('order_by'=>'goods_name','order_sort'=>$order_sort));?>" title="点击对列表排序">商品名称</a></th>
            <th><a href="<?php echo U('Goods/goodsList',array('order_by'=>'goods_sn','order_sort'=>$order_sort));?>">货号</a></th>
            <th><a href="<?php echo U('Goods/goodsList',array('order_by'=>'shop_price','order_sort'=>$order_sort));?>">价格</a></th>
            <th><a href="<?php echo U('Goods/goodsList',array('order_by'=>'is_on_sale','order_sort'=>$order_sort));?>">上架</a></th>
            <th><a href="<?php echo U('Goods/goodsList',array('order_by'=>'goods_number','order_sort'=>$order_sort));?>" >库存</a></th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                <td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_id"]); ?></td>
                <td class="first-cell" style="background-color: rgb(255, 255, 255);"><span
                        onclick="listTable.edit(this, 'edit_goods_name', 16)"><?php echo ($vo["goods_name"]); ?></span></td>
                <td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 16)"><?php echo ($vo["goods_sn"]); ?></span>
                </td>
                <td align="right" style="background-color: rgb(255, 255, 255);"><span
                        onclick="listTable.edit(this, 'edit_goods_price', 16)"><?php echo ($vo["market_price"]); ?>
                </span></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif"
                                                                                      onclick="listTable.toggle(this, 'toggle_on_sale', 16)">
                </td>


                <td align="right" style="background-color: rgb(255, 255, 255);"><span
                        onclick="listTable.edit(this, 'edit_goods_number', 16)"><?php echo ($vo["goods_number"]); ?></span></td>
                <td align="center" style="background-color: rgb(255, 255, 255);">
                    <a href="../goods.php?id=16" target="_blank" title="查看">查看</a>
                    <a href="goods.php?act=edit&amp;goods_id=16&amp;extension_code=" title="编辑">编辑</a>
                    <a href="goods.php?act=copy&amp;goods_id=16&amp;extension_code=" title="复制">复制</a>
                    <a href="javascript:;" onclick="listTable.remove(<?php echo ($vo["goods_id"]); ?>, '您确实要把该商品放入回收站吗？')" title="回收站">删除</a>
                    <a href="comment_collect.php?act=comment&amp;goods_id=16">生成评论</a>
                    <!-- ahuoo end -->
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="page_wrapper"><ul class="pagination"><?php echo ($page); ?></ul></div>
</div>
<script>
    $(document).ready(function(){

        //排序
        $('.checkall').on('click',function(){
            if($(this).prop('checked')==true){
                $(":checkbox[name='checkboxes[]']").prop('checked','checked');
            }else{
                $(":checkbox[name='checkboxes[]']").prop('checked','');
            }

        });
    });


</script>
</body>
</html>