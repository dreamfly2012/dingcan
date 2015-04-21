<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>会员等级</title>
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
                <li><a href="<?php echo U('Member/memberList');?>">会员管理</a></li>
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
            <a href="<?php echo U('Member/rankAdd');?>">添加会员等级</a>
            <thead>
            <tr>
                <th>
                    <span>会员等级</span>
                </th>
                <th>
                    <span>所需积分</span>
                </th>
                <th>
                    <span>享受折扣</span>
                </th>
                <th>
                    <span>操作</span>
                </th>
            </tr>
            </thead>

            <tbody>

            <?php if(is_array($list)): foreach($list as $key=>$rank): ?><tr>
                    <td>
                        <span><?php echo ($rank["rank_name"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($rank["level_points"]); ?></span>
                    </td>
                    <td>
                        <span><?php echo ($rank["discount"]); ?></span>
                    </td>
                    <td>
                        <a href="<?php echo U('Member/rankEdit',array('rank_id'=>$rank['rank_id']));?>" title="编辑">编辑</a>
                        <a href="javascript:;" class="del_rank" data-id="<?php echo ($rank["rank_id"]); ?>" title="删除">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="page_wrapper">
            <ul class="pagination"><?php echo ($page); ?></ul>
        </div>

    </div>
</div>

<script>
    var __DEL_RANK_URL__ = "<?php echo U('Member/deleteMemberRank');?>";
   
    $(document).ready(function(){
         //等级删除
        $(".del_rank").click(function(){
            if(confirm("确认要删除会员等级吗？")){
                var $this = $(this);
                var rank_id = $(this).attr('data-id');
                $.ajax({
                    url: __DEL_RANK_URL__,
                    type: "POST",
                    data: {'rank_id':rank_id},
                    dataType: "html",
                    success: function(data){
                        if(data="true"){
                            alert("删除会员等级成功！");
                            $this.parent('td').parent('tr').remove();
                        }else{
                            alert('删除会员等级失败！');
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