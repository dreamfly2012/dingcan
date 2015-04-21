<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>订单列表页</title>
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">巨搜Shop</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="/Admin/Goods/goodsList.html">商品管理</a></li>
                <li><a href="/Admin/Order/orderList.html">订单管理</a></li>
                <li><a href="/Admin/Address/addressList.html">地址管理</a></li>
                <li><a href="/Admin/Comment/commentList.html">评论管理</a></li>
                <li><a href="/Admin/User/userList.html">会员管理</a></li>
                <li><a href="/Admin/Store/storeSetting.html">商店设置</a></li>
            </ul>
        </div>
    </nav>


<div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="/Admin/Order/orderList.html">订单列表</a></li>
        <li class="list-group-item"><a href="/Admin/Order/orderSearch.html">订单查询</a></li>
        <li class="list-group-item"><a href="/Admin/Order/orderDeliverList.html">发货单列表</a></li>
        <li class="list-group-item"><a href="/Admin/Order/orderReturnList.html">退货单列表</a></li>
        <li class="list-group-item"><a href="/Admin/Order/orderPrintTemplate.html">订单打印模板</a></li>
    </ul>
</div>

<div class="right table-responsive">
    <table class="table table-striped table-bordered table_show">
        <caption>所有订单列表</caption>
        <thead>
        <tr>
            <th>
                <input class="checkall" type="checkbox">
                <a href="/Admin/Order/orderList/order_by/order_sn.html">订单号</a>
            </th>
            <th>
                <a href="/Admin/Order/orderList/order_by/add_time.html">下单时间</a>
            </th>
            <th><a href="/Admin/Order/orderList/order_by/consignee.html">收货人</a></th>
            <th><a href="javascript:;">操作</a></th>
        </tr>
        </thead>

        <tbody>
        <tr>
                <td>
                    <input type="checkbox" name="checkboxes[]" value="2009051217221" />
                    <span>2009051217221</span>
                </td>
                <td>
                    <span>2009-05-12 23:48:12</span>
                </td>
                <td>
                    <span>叶先生</span>
                </td>
                <td align="center">
                    <a href="/Admin/Order/orderShow/order_id/6.html" title="查看">查看</a>
                </td>
            </tr><tr>
                <td>
                    <input type="checkbox" name="checkboxes[]" value="2009051227085" />
                    <span>2009051227085</span>
                </td>
                <td>
                    <span>2009-05-12 23:49:43</span>
                </td>
                <td>
                    <span>叶先生</span>
                </td>
                <td align="center">
                    <a href="/Admin/Order/orderShow/order_id/7.html" title="查看">查看</a>
                </td>
            </tr><tr>
                <td>
                    <input type="checkbox" name="checkboxes[]" value="2009051299732" />
                    <span>2009051299732</span>
                </td>
                <td>
                    <span>2009-05-12 23:50:44</span>
                </td>
                <td>
                    <span>叶先生</span>
                </td>
                <td align="center">
                    <a href="/Admin/Order/orderShow/order_id/8.html" title="查看">查看</a>
                </td>
            </tr><tr>
                <td>
                    <input type="checkbox" name="checkboxes[]" value="2009051210718" />
                    <span>2009051210718</span>
                </td>
                <td>
                    <span>2009-05-12 23:55:32</span>
                </td>
                <td>
                    <span>叶先生</span>
                </td>
                <td align="center">
                    <a href="/Admin/Order/orderShow/order_id/9.html" title="查看">查看</a>
                </td>
            </tr>        </tbody>
    </table>

    <div class="col-md-3">
        <legend>批量操作</legend>
        <div class="form-group">
           <select class="form-control" id="batchsel">
                <option value="">请选择操作</option>
                <option	value="recycle">删除到回收站</option>
                <!--TODO: 其他的功能后续添加-->
            </select>
        </div>
        <button type="submit" id="batchedit" class="btn btn-primary">确认</button>
    </div>

    <div class="page_wrapper"><ul class="pagination"></ul></div>
</div>
<style>
    .table_show{
        padding-right: 30px;
        border : 1px gery solid;
        width:90%;
        font-color:#fff;
    }
</style>

<script>
    var __IS_ON_SALE_URL__ = "/Admin/Goods/goodsOnsaleORNot.html";
    var __DEL_GOODS_URL__ = "/Admin/Goods/goodsRecycleBin.html";
    var __Batch_GOODS_URL__ = "/Admin/Goods/goodsBatch.html";

    var message_confirm_del = '确认删除商品到回收站吗？';
    var message_confirm_batch_recycle = "确认要批量删除商品到回收站吗？";
    var message_no_select_operation ="你没有选择任何操作";
    var message_no_select_goods = "你没有选择任何商品";
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
        //
        $("#batchedit").click(function(){
            var option = $("#batchsel").val();
            var goods_ids = '';
            $("[name='checkboxes[]']:checkbox").each(function(){
                if($(this).prop('checked')==true){
                    goods_ids += $(this).val()+":";
                }
            });
            if(option == ''){
                alert(message_no_select_operation);
            }else if(goods_ids == ''){
                alert(message_no_select_goods);
            }else{
                var confirm_message = message(option);

                if(confirm(confirm_message)){
                    $.ajax({
                        url: __Batch_GOODS_URL__,
                        type: "POST",
                        data: { 'goods_ids': goods_ids, 'operation': option},
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

        //商品上下架处理
        $(".is_on_sale").click(function(){
            var $this = $(this);
            var is_on_sale = $(this).attr('data-value')==0 ? 1 : 0;
            var show_value = $(this).val()=="X" ? "V" : "X";
            $.ajax({
                url: __IS_ON_SALE_URL__,
                type: "POST",
                data: { 'goods_id':$(this).attr('data-id'), 'is_on_sale' : is_on_sale },
                dataType: "html",
                success: function(data){
                    $this.attr('data-value',is_on_sale);
                    $this.val(show_value);
                }
            });
        });

        //商品删除
        $(".del_goods").click(function(){
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