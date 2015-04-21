<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input class="listTable" data-sort-by="checkboxes" data-sort-order="DESC" type="checkbox">
            <a class="listTable" href="javascript:;" data-sort-by="goods_id" data-sort-order="<?php echo ($sort_order); ?>">编号</a></th>
        <th><a class="listTable" href="javascript:;" data-sort-by='goods_name' data-sort-order="<?php echo ($sort_order); ?>" title="点击对列表排序">商品名称</a></th>
        <th><a class="listTable" href="javascript:;" data-sort-by='goods_sn' data-sort-order="<?php echo ($sort_order); ?>">货号</a></th>
        <th><a class="listTable" href="javascript:;" data-sort-by='shop_price' data-sort-order="<?php echo ($sort_order); ?>">价格</a></th>
        <th><a class="listTable" href="javascript:;" data-sort-by='is_on_sale' data-sort-order="<?php echo ($sort_order); ?>">上架</a></th>
        <th><a class="listTable" href="javascript:;" data-sort-by='goods_number' data-sort-order="<?php echo ($sort_order); ?>">库存</a></th>
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