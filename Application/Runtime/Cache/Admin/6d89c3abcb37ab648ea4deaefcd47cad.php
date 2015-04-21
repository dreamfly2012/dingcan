<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>修改兑换券</title>
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
                <li><a href="<?php echo U('Coupon/index');?>">兑换券管理</a></li>
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
        <li class="list-group-item"><a href="<?php echo U('Coupon/couponAdd');?>">添加兑换券</a></li>
        <li class="list-group-item"><a href="<?php echo U('Coupon/couponList');?>">兑换券列表</a></li>
    </ul>
</div>

<div class="right_content container">
    <div class="container">
        <h2>编辑兑换券</h2>
        <form name="form" id="form" enctype="multipart/form-data" action="<?php echo U('Coupon/updateCoupon');?>" method="post" class="form" role="form">
            <div class="form-group">
    <label for="name">名称：</label>
    <span><input type="text" name="name" id="name" value="<?php echo ($coupon["name"]); ?>" class="form-control" /></span>
</div>

<div class="form-group">
    <label for="coupon_code">兑换码：<a href="javascript:;" class="generate">生成唯一兑换码</a></label>
    <span><input type="text" name="coupon_code" id="coupon_code" value="<?php echo ($coupon["coupon_code"]); ?>" class="form-control" /></span>
</div>

<div class="form-group">
    <label for="pay_points">兑换分数：</label>
    <input type="text" name="pay_points" id="pay_points" class="form-control" value="<?php echo ($coupon["pay_points"]); ?>" />
</div>

<div class="form-group">
    <label for="validate_date">有效期：</label>
    <input type="text" name="validate_date" id="validate_date" class="form-control" value="<?php echo (date('Y-m-d H:i:s',$coupon["validate_date"])); ?>"/>
</div>

<div class="form-group">
    <label for="status">是否可用:</label>
    <select name="status" id="status" class="form-control">
        <?php if(is_array($choice_statuses)): foreach($choice_statuses as $key=>$choice): ?><option value="<?php echo ($choice["value"]); ?>" <?php if($choice['value'] == $coupon['status']): ?>selected="selected"<?php endif; ?>><?php echo ($choice["name"]); ?></option><?php endforeach; endif; ?>
    </select>
</div>

<div class="form-group">
    <input type="hidden" name="id" value="<?php echo ($coupon["id"]); ?>">
    <input type="submit" value=" 确定 " class="form-control btn btn-primary">
</div>

<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>
<script>
    var __GENERATE_CODE_URL__ = "<?php echo U('Coupon/generateCode');?>";
    $(document).ready(function(){
        $("#validate_date").datetimepicker({
            timeFormat: 'HH:mm:ss',
            dateFormat: 'yy-mm-dd'
        });

        $(".generate").click(function(){
            $.ajax({
                url: __GENERATE_CODE_URL__,
                type: "POST",
                dataType: "json",
                success: function (data) {
                    if(data.message=="success"){
                        alert("生成兑换券成功！");
                        $("#coupon_code").val(data.info);
                    }else{
                        alert("生成兑换券失败");
                    }

                }
            });
        });
    });
</script>
        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>