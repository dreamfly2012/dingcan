<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>会员列表页</title>
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
        <li class="list-group-item"><a href="<?php echo U('Member/memberAdd');?>">添加会员</a></li>
        <li class="list-group-item"><a href="<?php echo U('Member/memberList');?>">会员列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Member/memberRank');?>">会员等级</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="table-responsive container">
        <table class="table table-striped table-bordered">
            <caption>会员列表</caption>
            <thead>
            <tr>
                <th>
                    <input class="check_all" type="checkbox">
                    <a href="<?php echo U('Member/memberList',array('order_by'=>'id','order_sort'=>$order_sort));?>" title="排序">编号</a>
                </th>
                <th>
                    <a href="<?php echo U('Member/memberList',array('order_by'=>'name','order_sort'=>$order_sort));?>" title="排序">会员名称</a>
                </th>
                <th><a href="<?php echo U('Member/memberList',array('order_by'=>'email','order_sort'=>$order_sort));?>" title="排序">会员邮件</a></th>
                <th><a href="<?php echo U('Member/memberList',array('order_by'=>'level','order_sort'=>$order_sort));?>" title="排序">等级</a></th>
                <th><a href="<?php echo U('Member/memberList',array('order_by'=>'score','order_sort'=>$order_sort));?>" title="排序">积分</a></th>
                <th><a href="<?php echo U('Member/memberList',array('order_by'=>'jointime','order_sort'=>$order_sort));?>" title="排序">加入时间</a></th>
                <th><a href="javascript:;">操作</a></th>
            </tr>
            </thead>

            <tbody>

            <?php if(is_array($list)): foreach($list as $key=>$member): ?><tr>
                    <td>
                        <input type="checkbox" name="checkboxes[]" value="<?php echo ($member["id"]); ?>" class="single_check"/>
                        <span><?php echo ($member["id"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($member["user_info"]["user_name"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($member["user_info"]["email"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($member["rank_info"]["rank_name"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($member["score"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo (now_date($member["join_time"])); ?></span>
                    </td>

                    <td>
                        <a href="<?php echo U('Member/memberEdit',array('id'=>$member['id']));?>" title="编辑">编辑</a>
                        <a href="javascript:;" class="del_member" data-id="<?php echo ($member["user_id"]); ?>">删除</a>
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
                <option	value="delete">删除会员</option>
            </select>
        </div>
        <input type="button" id="batch" value="确认" class="btn btn-primary form-control"/>
    </div>


</div>

<script>
    var __DEL_MEMBER_URL__ = "<?php echo U('Member/memberDelete');?>";
    var __BATCH_MEMBER_URL__ = "<?php echo U('Member/memberBatch');?>";

    $(document).ready(function(){

        //批量编辑
        $("#batch").click(function(){
            var option = $("#batchsel").val();
            var user_ids = '';
            $(".single_check").each(function(){
                if($(this).prop('checked')==true){
                    user_ids += $(this).val()+":";
                }
            });
            if(option == ''){
                alert("你没有选择任何操作！");
            }else if(user_ids == ''){
                alert("你没有选择任何会员！");
            }else{

                if(confirm("确定要批量删除会员吗？这将无法恢复！")){
                    $.ajax({
                        url: __BATCH_MEMBER_URL__,
                        type: "POST",
                        data: { 'user_ids': user_ids, 'operation': option},
                        dataType: "html",
                        success: function(data){
                            if(data!="true"){
                                alert("批量删除失败");
                            }else{
                                alert("批量删除成功");
                                window.location.reload();
                            }
                        }
                    });
                }
            }
        });

        //会员删除
        $(".del_member").click(function(){
            if(confirm("确认要删除会员吗？将无法恢复！")){
                var $this = $(this);
                var user_id = $(this).attr('data-id');
                $.ajax({
                    url: __DEL_MEMBER_URL__,
                    type: "POST",
                    data: {'user_id':user_id},
                    dataType: "html",
                    success: function(data){
                        if(data="true"){
                            alert("删除会员成功！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert('删除会员失败！');
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