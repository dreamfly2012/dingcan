<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>订单详情页</title>
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
    <?php if($_SESSION['user_id']!= ''): ?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">巨搜Shop</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Goods/goodsList');?>">商品管理</a></li>
                <li><a href="<?php echo U('Order/orderList');?>">订单管理</a></li>
                <li><a href="<?php echo U('Address/addressList');?>">地址管理</a></li>
                <li><a href="<?php echo U('Comment/commentList');?>">评论管理</a></li>
                <li><a href="<?php echo U('User/userList');?>">会员管理</a></li>
                <li><a href="<?php echo U('Shop/storeSetting');?>">商店设置</a></li>
            </ul>
        </div>
    </nav><?php endif; ?>



<div class="left">
    <ul class="list-group black">
        <li class="list-group-item"><a href="<?php echo U('Order/orderList');?>">订单列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderSearch');?>">订单查询</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderDeliverList');?>">发货单列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderReturnList');?>">退货单列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Order/orderPrintTemplate');?>">订单打印模板</a></li>
    </ul>
</div>

<div class="right table-responsive">
    <table class="table table-striped table-bordered table_show">
        <caption>订单详情列表</caption>
        <thead>
        <tr>
            <th>
                订单基本信息
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table class="table order_basic">
                    <thead>
                    <tr>
                        <th>订单号</th>
                        <th>配送方式</th>
                        <th>支付方式</th>
                        <th>订单状态</th>
                        <th>下单时间</th>
                        <th>付款时间</th>
                        <th>发货时间</th>
                        <th>收货时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo ($order["order_sn"]); ?></td>
                        <td><?php echo (get_shipping_name_by_id($order["shipping_id"])); ?></td>
                        <td><?php echo (get_pay_method_by_id($order["pay_id"])); ?></td>
                        <td><?php echo (get_order_status_name($order["order_status"])); ?>|<?php echo (get_shipping_status_name($order["shipping_status"])); ?>|<?php echo (get_pay_status_name($order["pay_status"])); ?></td>
                        <td><?php echo (mydatetime($order["add_time"])); ?></td>
                        <td><?php echo (mydatetime($order["pay_time"])); ?></td>
                        <td><?php echo (mydatetime($order["shipping_time"])); ?></td>
                        <td><?php echo (mydatetime($order["confirm_time"])); ?></td>
                    </tr>
                    </tbody>
                </table>
            </td>

        </tr>
        </tbody>
    </table>

    <table class="table table-striped table-bordered table_show">
        <thead>
        <tr>
            <th>收货人信息</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table class="table order_consignee">
                    <thead>
                    <tr>
                        <th>收货人名字</th>
                        <th>收货人地址</th>
                        <th>收货人电话</th>
                        <th>收货人邮件</th>
                        <th>收货人邮编</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo ($consignee["consignee"]); ?></td>
                        <td><?php echo ($address_info); echo ($consignee["address"]); ?></td>
                        <td><?php echo ($consignee["telephone"]); ?></td>
                        <td><?php echo ($consignee["email"]); ?></td>
                        <td><?php echo ($consignee["postcode"]); ?></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table table-striped table-bordered table_show">
        <thead>
        <tr>
            <th>
                商品信息
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table class="table table-striped table-bordered table_show">
                    <thead>
                        <tr>
                            <th>商品名称</th>
                            <th>商品货号</th>
                            <th>商品价格</th>
                            <th>商品数量</th>
                            <th>商品属性</th>
                            <th>商品小计</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($goods_info)): foreach($goods_info as $key=>$goods): ?><tr>
                            <td><?php echo ($goods["goods_name"]); ?></td>
                            <td><?php echo ($goods["goods_sn"]); ?></td>
                            <td><?php echo ($goods["goods_price"]); ?></td>
                            <td><?php echo ($goods["goods_number"]); ?></td>
                            <td><?php echo ($goods["goods_attr"]); ?></td>
                            <td><?php echo ($goods["goods_total_price"]); ?></td>
                        </tr><?php endforeach; endif; ?>
                        <tr>
                            <td>运费：<?php echo ($order["shipping_fee"]); ?><br>
                                总计：<?php echo ($order["order_amount"]); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table table-striped table-bordered table_show">
        <thead>
        <tr>
            <th>
                操作
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <form action="<?php echo U('Order/orderOperate');?>" method="post">
                <table class="table table-striped table-bordered table_show">

                    <thead>
                        <tr>
                            <th>当前可执行的操作</th>
                            <th>确认操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="method" id="operate">
                                    <?php if(is_array($operations)): foreach($operations as $key=>$operate): ?><option value="<?php echo ($key); ?>"><?php echo ($operate); ?></option><?php endforeach; endif; ?>
                                </select>
                                <input type="hidden" name="order_id" value="<?php echo ($order["order_id"]); ?>" />
                            </td>
                            <td>
                                <button class="btn btn-default operation" type="submit">确认</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="modal fade show_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">订单操作</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="action_note">操作说明</label>
                        <textarea name="action_note" class="form-control" id="action_note" placeholder="操作说明"></textarea>
                        <input type="text" name="method" value="" id="method" class="none">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary confirm">确认</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->"
</div>
<style>
    .table_show {
        padding-right: 30px;
        border: 1px gery solid;
        width: 90%;
        font-color: #fff;
    }
</style>

        <script>
            var __ORDER_OPERATE_URL__ = "<?php echo U('Order/orderOperate');?>";

            $(document).ready(function(){
                //操作选择后进行的js
                $(".operation").click(function(){
                    var opeartion = $("#operate").val();
                    $("#method").val(opeartion);
                    if(opeartion=="after_service"||opeartion=="unpay"){
                        $(".show_modal").modal('show');
                        return false;
                    }
                });
                //当售后弹出层，点击确认时的js
                $(".confirm").click(function(){
                    $.ajax({
                        url: __ORDER_OPERATE_URL__,
                        type: "POST",
                        data: { 'order_id': '<?php echo ($order["order_id"]); ?>', 'action_note': $("#action_note").val() , 'method': $("#method").val()},
                        dataType: "html",
                        success: function(data){
                            if(data=="true"){
                                alert("添加信息成功");
                            }else{
                                alert("添加信息失败");
                            }
                            window.location.reload();
                        }
                    });
                });
            });
        </script>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>