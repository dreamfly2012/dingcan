<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>广告添加</title>
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
        <li class="list-group-item"><a href="<?php echo U('Ad/adAdd');?>">添加广告</a></li>
        <li class="list-group-item"><a href="<?php echo U('Ad/adList');?>">广告列表</a></li>
    </ul>
</div>

<div class="right">
    <div class="container">
        <h2>广告添加</h2>
        <form name="form" id="form" enctype="multipart/form-data" action="<?php echo U('Ad/addAd');?>" method="post" class="form" role="form">
            <div>
    <div class="form-group">
        <label for="ad_name">广告名称：</label>
        <input type="text" name="ad_name"  id="ad_name" value="<?php echo ($ad["ad_name"]); ?>" class="form-control" placeholder="广告名称">
    </div>

    <div class="form-group">
        <label for="ad_link">广告链接</label>
        <input type="text" name="ad_link"  id="ad_link" value="<?php echo ($ad["ad_link"]); ?>" class="form-control" placeholder="广告链接">
    </div>

    <div class="form-group">
        <label for="ad_code">广告代码</label>
        <textarea id="ad_code" name="ad_code" class="form-control" rows="4">
            <?php echo ($ad["ad_code"]); ?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="position_id">广告位置</label>
        <select name="position_id" id="position_id" class="form-control">
            <?php if(is_array($position)): foreach($position as $key=>$position): ?><option value="<?php echo ($position["position_id"]); ?>"
                <?php if($position["position_id"] == $ad['position_id']): ?>selected='selected'<?php endif; ?>
                >
                <?php echo ($position["position_name"]); echo ($position["ad_width"]); ?>*<?php echo ($position["ad_height"]); ?>
                </option><?php endforeach; endif; ?>
        </select>
    </div>


    <div class="form-group">
        <label for="start_time">广告开始时间</label>
        <input type="text" name="start_time" id="start_time" value="<?php echo (now_date($ad["start_time"])); ?>" readonly="readonly" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="end_time">广告结束时间</label>
        <input type="text" name="end_time" id="end_time" value="<?php echo (now_date($ad["end_time"])); ?>" readonly="readonly" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="ad_img">上传广告：</label>

        <?php if($ad["ad_img"] == ''): ?><input type="file" name="ad_img" id="ad_img" class="form-control" >
            <p class="help-block">图片未上传.</p>
        <?php else: ?>
            <img src="/Uploads/<?php echo ($ad["ad_img"]); ?>" width="100" height="100"/>
            <input type="file" class="form-control" id="ad_img" name="ad_img">
            <p class="help-block">重新上传将删除源文件.</p><?php endif; ?>
    </div>

    <div class="form-group">
        <input type="hidden" name="ad_id" value="<?php echo ($ad["ad_id"]); ?>">
        <input type="submit" value=" 确定 " class="form-control btn btn-primary">
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/jqvalidate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/Admin/jqvalidate/messages_zh.min.js"></script>
<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>
<script>
    $(document).ready(function () {

        //广告开始结束时间 datetimepicker
        $("#start_time").datetimepicker({
            timeFormat: 'HH:mm:ss',
            dateFormat: 'yy-mm-dd'
        });
        $("#end_time").datetimepicker({
            timeFormat: 'HH:mm:ss',
            dateFormat: 'yy-mm-dd'
        });

        //表单提交验证jquery.validate.js
        $("#form").validate({
            rules: {
                ad_name: {
                    required: true
                },
                ad_img:{
                    required:true
                }
            }
        });


    });


</script>
        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>