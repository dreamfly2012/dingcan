<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商品分类管理</title>
    <meta name="keywords" content=""/>
    <meta name="description" content="商品分类的管理"/>
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
        <li class="list-group-item"><a href="<?php echo U('Category/categoryList');?>">商品分类</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="container">
        <div class="col-md-12">
            <h2>商品分类树的管理</h2>
        </div>
        <div class="col-md-12">
            <div id="category"></div>
        </div>
        <div class="col-md-12">
            <button id="add_category" class="btn btn-default">添加新的分类</button>
            <a data-toggle="modal" href="#editTreeForm" class="btn btn-default">重命名分类</a>
            <button id="del_category" class="btn btn-default">删除分类</button>
            <button id="update_category" class="btn btn-default">更新分类</button>
        </div>
        <div id="editTreeForm" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">×</a>
                        <h3>编辑分类树</h3>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">分类名称:</label>
                            <input type="text" id="category_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-success" id="category_confirm">确定</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal">关闭</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/Public/Admin/jqtree/jqtree.css" />
<script type="text/javascript" src="/Public/Admin/jqtree/tree.jquery.js"></script>
<style>
#category{
	padding:30px 0;
}
.white{
	color:white;
}
.jqtree-tree .jqtree-title {
	color: #53D812;
	vertical-align: middle;
	margin-left: 1.5em;
	font-size:20px;
}

ul.jqtree-tree li.jqtree-selected > .jqtree-element, ul.jqtree-tree li.jqtree-selected > .jqtree-element:hover {
	background-color: #D01120;
	background: -webkit-gradient(linear, left top, left bottom, from(#D01120), to(#D011DD));
	background: -moz-linear-gradient(top, #D01120, #D011DD);
	background: -ms-linear-gradient(top, #D01120, #D011DD);
	background: -o-linear-gradient(top, #D01120, #D011DD);
	text-shadow: 0 1px 0 rgba(255, 255, 255, 0.7);
}
</style>

<script>
    var __LOAD_CATEGORY__ = "<?php echo U('Category/loadCategory');?>";

    var __UPDATE_CATEOGRY__ = "<?php echo U('Category/updateCategory');?>";

    var bigid = 0;

    function getMaxId(json){
    	var ids = new Array();
    	if(json!=undefined){
    		if(json.length!=0){
    			var length = json.length;
				for(var i=0; i<length; i++){
					bigid = json[i].id;
					if(json[i].children!=undefined){
						getMaxId(json[i].children);
					}
				}
    		}
			
    	}
		return bigid;
    }

    $(document).ready(function(){
        $('#category').tree({
            dataUrl: __LOAD_CATEGORY__,
            selectable: true,
            dragAndDrop:true
        });

        $("#update_category").click(function(){
        	var json = $.parseJSON($("#category").tree('toJson'));
        	$.ajax({
	            url: __UPDATE_CATEOGRY__,
	            type: "POST",
	            data: { 'category':json },
	            dataType: "html",
	            success: function(data){
                    if(data=="true"){
                        alert("更新分类树成功！");
                    }else{
                        alert("更新分类树失败！");
                    }
                    $('#category').tree('loadDataFromUrl', __LOAD_CATEGORY__);
	            }
	        });
        });

        $("#add_category").click(function(){
        	var json = $.parseJSON($("#category").tree('toJson'));
        	var id = parseInt(getMaxId(json));
            $('#category').tree(
                'appendNode',
                {
                    label:'新的节点',
                    cat_name:'新的节点',
                    id: id+1,
                    cat_id:id+1
				}
            );
        });

        $("#del_category").click(function(){
            var node = $("#category").tree('getSelectedNode');
            $("#category").tree('removeNode',node);
        });

        //"cat_id":"15","cat_name":"联通手机充值卡","name":"联通手机充值卡","id":"15"
	    $("#category_confirm").on('click',function(){
	            var name = $("#category_name").val();
	            var node = $("#category").tree('getSelectedNode');
	            $("#category").tree(
	                    'updateNode',
	                    node,
	                    {
	                        label: name,
	                        cat_name: name
						}
	            );
	            $('#editTreeForm').modal('hide');
	        });
		});



</script>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>