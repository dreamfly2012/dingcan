<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>发货配置</title>
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
        <caption>确认收货信息及交易详情</caption>
        <tr>
            <th>
                收货地址(<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".consignee_address_modal">修改发货地址</button>)
            </th>
            <td>
                <span id="receive_address"><?php echo ($detail_address); ?></span>
            </td>
        </tr>

    </table>

    <table class="table table-striped table-bordered table_show">
        <caption>确认发货/退货信息</caption>
        <tbody>
        <tr>
            <th>
                我的发货地址(<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".address_deliver_modal">修改发货地址</button>)
            </th>
            <td>
                <span id="deliver_address"><?php echo ($deliver_default_address); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                我的退货地址(<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".address_refund_modal">修改退货地址</button>)
            </th>
            <td>
                <span id="return_address"><?php echo ($refund_default_address); ?></span>
            </td>
        </tr>
        </tbody>
    </table>

    <div>
    <form action="<?php echo U('Order/order');?>" method="post">
        <h3>选择物流服务</h3>

        <ul class="nav nav-tabs">
            <!--<li><a href="#online" data-toggle="tab">在线下单</a></li>-->
            <li><a href="#self" data-toggle="tab">物流发货已确认</a></li>
            <!--<li><a href="#none" data-toggle="tab">无需物流</a></li>-->
        </ul>

        <div class="tab-content">
            <!--<div class="tab-pane active" id="online">TODO: 物流信息 </div>-->
            <div class="tab-pane active" id="self">
                <!--TODO：物流接口暂未开发，直接确定-->
                <input type="submit" name="self" class="btn btn-default" value="确认发货"/>
            </div>
            <!--<div class="tab-pane" id="none">
                TODO：虚拟物品，直接确认即可
                <input type="submit" name="none" class="btn btn-default" value="确认发货" />
            </div>-->
        </div>
        <input type="hidden" name="method" value="deliver" />
    </form>
    </div>



    <div class="modal fade consignee_address_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">收货人信息编辑</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
    <label>收货地址</label>
    <select name="province" id="province">
        <?php if(is_array($province_list)): foreach($province_list as $key=>$province): ?><option value="<?php echo ($province["region_id"]); ?>" <?php if($consignee["province"] == $province.region_id): ?>selected<?php endif; ?>><?php echo ($province["region_name"]); ?></option><?php endforeach; endif; ?>
    </select>
    <select name="city" id="city">
        <?php if(is_array($city_list)): foreach($city_list as $key=>$city): ?><option value="<?php echo ($city["region_id"]); ?>" <?php if($consignee["city"] == $city.region_id): ?>selected<?php endif; ?>><?php echo ($city["region_name"]); ?></option><?php endforeach; endif; ?>
    </select>
    <select name="district" id="district">
        <?php if(is_array($district_list)): foreach($district_list as $key=>$district): ?><option value="<?php echo ($district["region_id"]); ?>" <?php if($consignee["district"] == $district.region_id): ?>selected<?php endif; ?>><?php echo ($district["region_name"]); ?></option><?php endforeach; endif; ?>
    </select>
</div>
<div class="form-group">
    <label for="consignee">联系人</label>
    <input type="text" name="consignee" class="form-control" id="consignee" value="<?php echo ($consignee["consignee"]); ?>"/>                       <input type="text" name="method" value="" id="method" class="none">
</div>
<div class="form-group">
    <label for="telephone">电话号码</label>
    <input type="text" name="telephone" class="form-control" id="telephone" value="<?php echo ($consignee["telephone"]); ?>" />
</div>
<div class="form-group">
    <label for="postcode">邮编</label>
    <input name="postcode" class="form-control" id="postcode" value="<?php echo ($consignee["postcode"]); ?>"/>
</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary confirm">确认</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade address_deliver_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">发货地址编辑</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="address_deliver_list">
                            已有发货地址
                        </label>
                        <select name="address_deliver_list" id="address_deliver_list">
                            <option value="">请选择</option>
                            <?php if(is_array($address_deliver_list)): foreach($address_deliver_list as $key=>$address): ?><option value="<?php echo ($address["address_id"]); ?>"><?php echo ($address["address_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary confirm_deliver_address">确认</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade address_refund_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">退货地址编辑</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="address_refund_list">
                            已有退货地址
                        </label>
                        <select name="address_refund_list" id="address_refund_list">
                            <option value="">请选择</option>
                            <?php if(is_array($address_refund_list)): foreach($address_refund_list as $key=>$address): ?><option value="<?php echo ($address["address_id"]); ?>"><?php echo ($address["address_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary confirm_refund_address">确认</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>
<style>

</style>

<script>
    var __CONFIRM_DELIVER_ADDRESS__ = "<?php echo U('Address/addressDeliverHandle');?>";
    var __CONFIRM_REFUND_ADDRESS__   = "<?php echo U('Address/addressRefundHandle');?>";

    $(document).ready(function(){
        $(".confirm_deliver_address").click(function(){
            $.ajax({
                url: __CONFIRM_DELIVER_ADDRESS__,
                type: "POST",
                data: { 'address_id': $("#address_deliver_list").val()},
                dataType: "html",
                success: function(data){
                    if(data!=""){
                        $("#deliver_address").html(data);
                    }
                    $(".address_deliver_modal").modal('hide');
                }
            });
        });

        $(".confirm_refund_address").click(function(){
            $.ajax({
                url: __CONFIRM_REFUND_ADDRESS__,
                type: "POST",
                data: { 'address_id': $("#address_refund_list").val()},
                dataType: "html",
                success: function(data){
                    if(data!=""){
                        $("#refund_address").html(data);
                    }
                    $(".address_refund_modal").modal('hide');
                }
            });
        });
    });
</script>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>