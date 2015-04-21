<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>商品添加</title>
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
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsAdd');?>">添加商品</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsList');?>">商品列表</a></li>
        <li class="list-group-item"><a href="<?php echo U('Goods/goodsRecycleBinList');?>">商品回收站</a></li>
    </ul>
</div>

<div class="right_content">
    <div class="container">
        <h2>商品添加</h2>
        <form name="form" id="form" enctype="multipart/form-data" action="<?php echo U('Goods/addGoods');?>" method="post" class="form" role="form">
            <ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#general" data-toggle="tab"> 普通信息</a>
    </li>
    <li>
        <a href="#detail" data-toggle="tab"> 详细描述</a>
    </li>
    <li>
        <a href="#mix" data-toggle="tab"> 其他信息</a>
    </li>
    <li>
        <a href="#sku" data-toggle="tab"> 商品sku信息</a>
    </li>
    <li>
        <a href="#gallery" data-toggle="tab"> 商品相册</a>
    </li>
</ul>

<div id="myTabContent" class="tab-content">

    <div id="general" class="tab-pane fade in active">

        <div class="form-group">
            <label for="goods_name">商品名称：</label>
            <input type="text" name="goods_name" id="goods_name" value="<?php echo ($goods["goods_name"]); ?>" class="form-control" placeholder="商品名称"/>
        </div>

        <div class="form-group">
            <label for="goods_sn">商品货号：</label>
            <input type="text" name="goods_sn" id="goods_sn" value="<?php echo ($goods["goods_sn"]); ?>" class="form-control" placeholder="商品货号"/>
        </div>

        <div class="form-group">
            <label for="category">商品分类：</label>
            <div id="category"></div>
            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo ($goods["cat_id"]); ?>"/>
        </div>

        <div class="form-group">
            <label for="brand_id">商品品牌：</label>
            <select name="brand_id" id="brand_id" class="form-control">
                <?php if(is_array($brands)): foreach($brands as $key=>$brand): ?><option value="<?php echo ($brand["brand_id"]); ?>" <?php if($brand["brand_id"] == $goods['brand_id']): ?>selected='selected'<?php endif; ?>>
                        <?php echo ($brand["brand_name"]); ?>
                    </option><?php endforeach; endif; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="shop_price">本店售价：</label>
            <input type="text" name="shop_price" id="shop_price" value="<?php echo ($goods["shop_price"]); ?>" class="form-control"/>
            <span class="input-group-btn">
                <input type="button" id="marketPriceSetted" value="按市场价打折计算" class="form-control btn-default btn"/>
            </span>
        </div>

        <div class="form-group">
            <label for="discount">折扣：</label>
            <input type="text" id="discount" class="form-control">
            <p class="help-block">0.8表示打8折,此处决定市场本店售价和市场售价的比值</p>
        </div>

        <div class="form-group">
            <label for="market_price">市场售价：</label>
            <input type="text" name="market_price" id="market_price" value="<?php echo ($goods["market_price"]); ?>" class="form-control"/>
            <span class="input-group-btn">
                <input type="button" id="integral_market_price" value="取整数" class="form-control btn btn-default"/>
            </span>
        </div>

        <div class="form-group">
            <label for="is_promote">是否促销：</label>
            <input type="checkbox" name="is_promote" id="is_promote" value="1" <?php if($goods['is_promote'] == 1): ?>checked="checked"<?php endif; ?> class="form-control"/>
        </div>

        <div class="form-group">
            <label for="promote_price">促销价</label>
            <input type="text" name="promote_price" id="promote_price" value="<?php echo ($goods["promote_price"]); ?>" <?php if($goods['is_promote'] != 1): ?>disabled="disabled"<?php endif; ?> class="form-control"/>
        </div>

        <div class="form-group">
            <label for="promote_start_date">促销开始日期</label>
            <input type="text" name="promote_start_date" id="promote_start_date" value="<?php echo (now_date($goods["promote_start_date"])); ?>" readonly="readonly" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="promote_end_date">截止日期</label>
            <input type="text" name="promote_end_date"  id="promote_end_date" value="<?php echo (now_date($goods["promote_end_date"])); ?>" readonly="readonly" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="goods_img">上传商品图片：</label>
            <?php if($goods["goods_img"] == ''): ?><input type="file" name="goods_img" id="goods_img" class="form-control" />
                <p class="help-block">图片未上传</p>
            <?php else: ?>
                <img src="/Uploads/<?php echo ($goods["goods_thumb"]); ?>" width="100" height="100"/>
                <input type="file" name="goods_img" id="goods_img" class="form-control">
                <p class="help-block">重新上传将删除源文件</p><?php endif; ?>
        </div>
    </div>


    <div id="detail" class="tab-pane fade">
        <div class="form-group">
            <script id="goods_desc" name="goods_desc" type="text/plain">
                <?php echo ($goods["goods_desc"]); ?>
            </script>
        </div>
    </div>


    <div id="mix" class="tab-pane fade">
        <div class="form-group">
            <label for="goods_weight">商品重量：</label>
            <input type="text" name="goods_weight" id="goods_weight" value="<?php echo ($goods["weight"]); ?>" class="form-control"/>
            <p class="help-block">单位：千克</p>
        </div>

        <div class="form-group">
            <label for="goods_number"> 商品库存数量：</label>
            <input type="text" name="goods_number" id="goods_number" value="<?php echo ($goods["goods_number"]); ?>" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="warn_number">库存警告数量：</label>
            <input type="text" name="warn_number" id="warn_number" value="<?php echo ($goods["warn_number"]); ?>" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="is_best">精品:</label>
            <input type="checkbox" name="is_best" id="is_best" value="1" <?php if($goods["is_best"] == 1): ?>checked="checked"<?php endif; ?> class="form-control" />
            <p class="help-block">精品勾选</p>
        </div>

        <div class="form-group">
            <label for="is_new">新品:</label>
            <input type="checkbox" name="is_new" id="is_new" value="1" <?php if($goods["is_new"] == 1): ?>checked="checked"<?php endif; ?> class="form-control" />
            <p class="help-block">新品勾选</p>
        </div>

        <div class="form-group">
            <label for="is_hot">热销</label>
            <input type="checkbox" name="is_hot" id="is_hot" value="1" <?php if($goods["is_hot"] == 1): ?>checked="checked"<?php endif; ?> class="form-control" />
            <p class="help-block">热销勾选</p>
        </div>

        <div class="form-group">
            <label for="is_shipping">是否免运费</label>
            <input type="checkbox" id="is_shipping" name="is_shipping" value="1" <?php if($goods["is_shipping"] == 1): ?>checked="checked"<?php endif; ?> class="form-control"/>
            <p class="help-block">免运费勾选</p>
        </div>

        <div class="form-group">
            <label for="keywords">商品关键词：</label>
            <input type="text" name="keywords" id="keywords" value="<?php echo ($goods["keywords"]); ?>" class="form-control"/>
            <p class="help-block">逗号分隔</p>
        </div>
    </div>


    <div id="sku" class="tab-pane fade">
        <div class="container">
            <table class="table-striped table table-bordered">
                <caption>商品sku修改</caption>
                <thead>
                <tr>
                    <th>sku属性</th>
                    <th>sku值</th>
                    <th>价格</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($skus)): foreach($skus as $key=>$sku): ?><tr>
                        <input type="hidden" name="goods_attr_id[]" value="<?php echo ($sku["goods_attr_id"]); ?>"/>
                        <td><input type="text" name="attr_name[]" value="<?php echo ($sku["attr_name"]); ?>"/></td>
                        <td><input type="text" name="attr_value[]" value="<?php echo ($sku["attr_value"]); ?>"/></td>
                        <td><input type="text" name="attr_price[]" value="<?php echo ($sku["attr_price"]); ?>"/></td>
                        <td><input type="button" class="btn btn-default deletesku" data-goods-attr-id="<?php echo ($sku["goods_attr_id"]); ?>"
                                   value="删除"/></td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td id="add_sku">[+]增加属性</td>
                    <td></td>
                    <td id="remove_sku">[-]移除属性</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div id="gallery" class="tab-pane fade">
        <div class="container">
            <table class="table-striped table table-bordered">
                <caption>商品相册修改</caption>
                <thead>
                <tr>
                    <th>图片描述</th>
                    <th>上传图片</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($galleries)): foreach($galleries as $key=>$gallery): ?><tr>
                        <input type="hidden" name="img_id" value="<?php echo ($gallery["img_id"]); ?>"/>
                        <td><img src="/Uploads/<?php echo ($gallery["thumb_url"]); ?>" width="100" height="100"/></td>
                        <td><input type="button" class="btn btn-default delete_gallery" data-goods-id="<?php echo ($goods["goods_id"]); ?>"
                                   data-img-id="<?php echo ($gallery["img_id"]); ?>" value="删除相册"/></td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td id="add_gallery">[+]增加相册</td>
                    <td id="remove_gallery">[-]移除相册</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="form-group">
        <input type="hidden" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>">
        <input type="submit" value=" 确定 " class="form-control btn btn-primary">
    </div>

</div>



<link rel="stylesheet" href="/Public/Admin/jqtree/jqtree.css"/>
<script type="text/javascript" src="/Public/Admin/jqtree/tree.jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/timepicker/js/jquery-ui-timepicker-addon.js"></script>


<!-- 配置文件 -->
<script type="text/javascript" src="/Public/Admin/ueditor1_4_3-utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/Public/Admin/ueditor1_4_3-utf8-php/ueditor.all.js"></script>
<script>
    var __LOAD_GOODS_CATEGORY__ = "<?php echo U('Category/loadCategory');?>";
    var __DELETE_GOODS_GALLERY__ = "<?php echo U('Goods/delGoodsGallery');?>";
    var __DELETE_GOODS_ATTR__ = "<?php echo U('Goods/delGoodsAttr');?>";

    
    var ue = UE.getEditor('goods_desc', {
        autoHeight: false
    });

    /*CKEDITOR.replace(  'goods_desc',
            {
                filebrowserBrowseUrl :  '/Public/Admin/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl :  '/Public/Admin/ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl :  '/Public/Admin/ckfinder/ckfinder.html?Type=Flash',
                filebrowserUploadUrl :  '/Public/Admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl  :  '/Public/Admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl  :  '/Public/Admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });*/
    $(document).ready(function () {
        //类型树初始化加载加载
        $('#category').tree({
            dataUrl: __LOAD_GOODS_CATEGORY__,
            selectable: true
        });

        $("#category").on(
                'tree.init',
                function () {
                    if ($("#cat_id").val() != "") {
                        var node = $('#category').tree('getNodeById', $("#cat_id").val());
                        $('#category').tree('selectNode', node);
                    }
                }
        );

        //类型树选择时的处理
        $('#category').on(
                'tree.select',
                function (event) {
                    if (event.node) {
                        // node was selected
                        var node = event.node;
                        $("#cat_id").val(node.cat_id);
                    }
                }
        );

       
        $("#is_promote").click(function(){
            if($("#is_promote").prop('checked')){
                $("#promote_price").removeAttr('disabled');
            }else{
                $("#promote_price").attr('disabled','disabled');
            }
        });

        //促销开始结束 datetimepicker
        $("#promote_start_date").datetimepicker({
            timeFormat: 'HH:mm:ss',
            dateFormat: 'yy-mm-dd'
        });
        $("#promote_end_date").datetimepicker({
            timeFormat: 'HH:mm:ss',
            dateFormat: 'yy-mm-dd'
        });


        //市场价取整数
        $("#integral_market_price").click(function () {
            $("#market_price").val(parseInt($("#market_price").val()));
        });

        //商店售价根据市场价进行打折
        $("#marketPriceSetted").click(function () {
            var market_price = $("#market_price").val();
            var discount = $("#discount").val();
            if (discount) {
                $("#shop_price").val(Math.round(market_price * discount * 100) / 100);
            } else {
                $("#shop_price").val(market_price);
            }
        });

        //商品sku的添加删除修改
        if ($("#add_sku").length != 0) {
            $("#add_sku").click(function () {
                var content = '<tr>' +
                        '<td><input type="text" name="attr_name[]" value="" /></td>' +
                        '<td><input type="text" name="attr_value[]" value="" /></td>' +
                        '<td><input type="text" name="attr_price[]" value="" /></td>' +
                        '</tr>';
                $(content).appendTo($(this).parent('tr').parent('tbody'));
            });
            $("#remove_sku").click(function () {
                if ($(this).parent('tr').next('tr').length != 0) {
                    $(this).parent('tr').next('tr').remove();
                }
            });
        }

        //删除sku
        if ($(".deletesku").length != 0) {
            $(".deletesku").click(function () {
                if (confirm("你真的要删除这个属性吗？")) {
                    var $this = $(this);
                    var goods_attr_id = $(this).attr('data-goods-attr-id');
                    $.ajax({
                        url: __DELETE_GOODS_ATTR__,
                        type: "POST",
                        data: {'goods_attr_id': goods_attr_id},
                        dataType: "html",
                        success: function (data) {
                            if(data==1){
                                $this.parent('td').parent('tr').remove();
                            }else{
                                alert('删除失败！');
                            }
                            
                        }
                    });
                }
            });
        }

        //商品相册的添加删除修改
        if ($("#add_gallery").length != 0) {
            $("#add_gallery").click(function () {
                var content = '<tr>' +
                        '<td><input type="text" name="img_desc[]" value="" /></td>' +
                        '<td><input type="file" name="img_url[]" value="" /></td>' +
                        '</tr>';
                $(content).appendTo($(this).parent('tr').parent('tbody'));
            });
            $("#remove_gallery").click(function () {
                if ($(this).parent('tr').next('tr').length != 0) {
                    $(this).parent('tr').next('tr').remove();
                }
            });
        }


        //删除商品相册
        if ($(".delete_gallery").length != 0) {
            $(".delete_gallery").click(function () {
                if (confirm("你真的要删除相册吗？")) {
                    var $this = $(this);
                    var img_id = $(this).attr('data-img-id');
                    $.ajax({
                        url: __DELETE_GOODS_GALLERY__,
                        type: "POST",
                        data: {'img_id': img_id},
                        dataType: "html",
                        success: function (data) {
                            if(data==1){
                                $this.parent('td').parent('tr').remove();
                            }else{
                                alert('删除失败');
                            }
                            
                        }
                    });
                }
            });
        }


    });


</script>




        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Admin/dist/js/common.js"></script>
</body>
</html>