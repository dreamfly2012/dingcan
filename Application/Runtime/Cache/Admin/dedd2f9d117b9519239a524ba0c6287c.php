<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>地址修改</title>
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
    <?php if($_SESSION['user_id']!= ''): ?><nav class="navbar navbar-inverse" role="navigation">
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
    <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsList');?>">商品列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsAdd');?>">添加商品</a></li>
        <li class="list-group-item"><a href="<?php echo U('Category/categoryList');?>">商品分类</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandList');?>">商品品牌</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsRecycleBinList');?>">商品回收站</a></li>
        <li class="list-group-item"><a href="<?php echo U('Brand/brandRecycleBinList');?>">品牌回收站</a></li>
    </ul>
</div>

<div class="right">
    <form role="form" action="<?php echo U('Address/addressUpdate');?>" method="post" name="myform" id="myform">
        <div class="container">
    <div class="row">
        <div classs="col-md-12">
            <div class="form-group">
                <label>收货地址</label>
                <select name="province" id="province">
                    <?php if(is_array($province_list)): foreach($province_list as $key=>$province): ?><option value="<?php echo ($province["region_id"]); ?>" <?php if($province['region_id'] == $address['province']): ?>selected='selected'<?php endif; ?>><?php echo ($province["region_name"]); ?></option><?php endforeach; endif; ?>
                </select>
                <select name="city" id="city">
                    <?php if(is_array($city_list)): foreach($city_list as $key=>$city): ?><option value="<?php echo ($city["region_id"]); ?>" <?php if($city['region_id'] == $address['city']): ?>selected='selected'<?php endif; ?>><?php echo ($city["region_name"]); ?></option><?php endforeach; endif; ?>
                </select>
                <select name="district" id="district">
                    <?php if(is_array($district_list)): foreach($district_list as $key=>$district): ?><option value="<?php echo ($district["region_id"]); ?>" <?php if($district['region_id'] == $address['district']): ?>selected='selected'<?php endif; ?>><?php echo ($district["region_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="consignee">详细地址</label>
                <input type="text" name="address" class="form-control" id="address" value="<?php echo ($address["address"]); ?>"/>
            </div>
            <div class="form-group">
                <label for="consignee">联系人</label>
                <input type="text" name="consignee" class="form-control" id="consignee" value="<?php echo ($address["consignee"]); ?>"/>
            </div>
            <div class="form-group">
                <label for="telephone">电话号码</label>
                <input type="text" name="telephone" class="form-control" id="telephone" value="<?php echo ($address["telephone"]); ?>" />
            </div>
            <div class="form-group">
                <label for="postcode">邮编</label>
                <input name="postcode" class="form-control" id="postcode" value="<?php echo ($address["postcode"]); ?>"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div classs="col-md-12">
            <input type="hidden" name="address_id" value="<?php echo ($address["address_id"]); ?>">
            <input type="submit" value="确定" class="form-control btn btn-default"><br><br>
            <input type="reset" value="重置" class="form-control btn btn-default">
        </div>
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/jqvalidate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/Admin/jqvalidate/messages_zh.min.js"></script>
<script>

   var __CHANGE_PROVINCE_URL__ = "<?php echo U('Address/addressChangeProvince');?>";
   var __CHANGE_CITY_URL__ = "<?php echo U('Address/addressChangeCity');?>";

   $(document).ready(function(){
       $("#myform").validate({
           rules: {
               province: {
                   required: true
               },
               city:{
                   required:true
               },
               district:{
                   required:true
               },
               address:{
                   required:true
               },
               telephone:{
                   required:true
               },
               postcode:{
                   required:true
               }
            }
       });
       $("#province").change(function(){
            var province = $("#province option:selected").val();
            $.ajax({
                url: __CHANGE_PROVINCE_URL__,
                type: "POST",
                data: {'province':province},
                dataType: "html",
                success: function(data){
                    $("#city").html(data);
                    $('#district').html('');
                }
            });
        });
       $("#city").change(function(){
           var city = $("#city option:selected").val();
           $.ajax({
               url: __CHANGE_CITY_URL__,
               type: "POST",
               data: {'city':city},
               dataType: "html",
               success: function(data){
                    $("#district").html(data);
               }
           });
       });
   });
</script>
    </form>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>