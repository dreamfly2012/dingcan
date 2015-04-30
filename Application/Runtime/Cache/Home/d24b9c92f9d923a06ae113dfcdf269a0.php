<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($store_config["store_title"]); ?></title>
        <!--文件引入顺序非常重要-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Home/css/common.css" rel="stylesheet">
        <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="/Public/Home/js/jquery.lazyload.min.js"></script>
        <script type="text/javascript">
	//购物车URL
	var __ADD_TO_AJAX_CART_URL__ = "<?php echo U('Cart/addToAjaxCart');?>";
	var __ADD_TO_CART_URL__ = "<?php echo U('Cart/addToCart');?>";
	var __ADD_GOODS_TO_COLLECT_URL = "<?php echo U('User/addGoodsToCollect');?>";
	var __ADD_STORE_TO_COLLECT_URL = "<?php echo U('User/addStoreToCollect');?>";
    var __LOGIN_HANDLE_URL__ = "<?php echo U('Login/loginHandle');?>";


</script>
    </head>
    <body>
        <div class="header wthrough">
            <div class="header_top w1200 m0auto">
                <div class="left fleft">
                    <ul>
                        <li class="pl20"><span class="fleft collection mr10"></span><a href="javascript:void(0);">收藏本站</a></li>
                        <li class="ml10">您好，欢迎光临诚佰商城！</li>
                        <?php if(is_null(session('user_id'))): ?>
                        <li class="login_info">
                            <span class="login mr10">
                                <a href="<?php echo U('Login/index');?>">登录</a>
                            </span>
                            <span class="register">
                            <a href="<?php echo U('Register/index');?>">注册</a>
                            </span>
                        </li>
                        <?php else: ?>
                        <li class="login_info">
                            <a href="<?php echo U('Login/loginout');?>">退出</a>
                        </li>
                        <?php endif;; ?>
                    </ul>
                </div>
                <div class="right fright">
                    <ul>
                        <li><a href="<?php echo U('User/orderlistSetting');?>">我的订单</a></li>
                        <li class="hou-list"><a href="<?php echo U('User/index');?>">我的诚佰</a></li>
                        <li class="qian-list"><a href="#">手机诚佰</a></li>
                        <li class="hou-list"><a href="#">网站导航</a></li>
                        <li class="hou-list"><a href="#">客户服务</a></li>
                        <li class="qian-list"><a href="<?php echo U('Cart/showCart');?>">购物车</a></li>
                        <li class="hou-list"><a href="#">关注诚佰</a></li>
                        <li class="no-separate">客服热线：<font color="red">400-0431-918</font></li>
                    </ul>
                </div>
            </div>
        </div>

<div class="header wthrough" style="background: none;">
    ﻿<div class="header_middle w1200 m0auto of ">
    <div id="logo" class="fleft">
        <a href="/"><img src="/Public/Home/images/logo.png" alt="诚佰" height="68" width="210"></a>
    </div>
    <div class="fleft logo_ad ml10">
    </div>
    <div class="search_warp fright ml35" style="margin-right:80px;">
        <div class="search">
            <form action="<?php echo U('Search/searchGoods');?>" method="post" name="searchForm" id="searchForm">
                <div class="input fleft"><input name="goods_name" type="text"></div>
                <div class="submit fleft"><input value="搜 索" type="submit"></div>
            </form>
        </div>
        <div class="clr"></div>
        <div class="hot_keywords">
            热门搜索：
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>'75老山神'));?>" target="_blank">75老山神</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>'沱牌'));?>" target="_blank">沱牌十年</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>'酒鬼'));?>" target="_blank">酒鬼</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>'益达'));?>" target="_blank">益达</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>'冰粉'));?>" target="_blank">冰粉</a>&nbsp;
        </div>
    </div>
</div>
<div class="nav_awrp wthrough">
    <div class="nav w1200 m0auto">
        <div class="all_category fleft">
            <div class="all_category_switch">
                <span class="home fleft ml10 mr5"></span>全部商品分类
                <span class="down fright mr20"></span>
            </div>
            
            <div class="cateMenu none">
                <ul>
                    <?php if(is_array($nav_categories)): $k = 0; $__LIST__ = $nav_categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav_category): $mod = ($k % 2 );++$k;?><li style="border-top: 0px;" <?php if($k%2): ?>class="even"<?php endif; ?>>
                        <div class="cate-tag">
                            <strong><a href="<?php echo U('Category/categoryList',array('cat_id'=>$nav_category['cat_id']));?>"><?php echo ($nav_category['cat_name']); ?></a></strong>
                            <div class="listModel">
                                <?php if(is_array($nav_category["children"])): $i = 0; $__LIST__ = $nav_category["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children_category): $mod = ($i % 2 );++$i;?><div style=" width:60px; float:left"><a href="<?php echo U('Search/searchGoods',array('goods_name'=>$children_category['cat_name']));?>"><?php echo ($children_category['cat_name']); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                        <div class="list-item hide">
                            <ul class="itemleft">
                                <?php if(is_array($nav_category["children"])): $i = 0; $__LIST__ = $nav_category["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children_category): $mod = ($i % 2 );++$i;?><dl>
                                    <dt><?php echo ($children_category['cat_name']); ?></dt>
                                    <dd>
                                        <?php if(is_array($children_category["children"])): $i = 0; $__LIST__ = $children_category["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_children_category): $mod = ($i % 2 );++$i;?><!--榨汁机、豆浆机、电饭煲、面包机、咖啡机、电烤箱、电磁炉、电饼铛、煮蛋器、酸奶机、电热水壶、电热饭盒-->
                                        <a title="<?php echo ($nav_goods["goods_name"]); ?>" target="_blank" href="<?php echo U('Search/searchGoods',array('goods_name'=>$sub_children_category['cat_name']));?>"><?php echo ($sub_children_category['cat_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </dd>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="nav_list fleft">
            <ul>
                <li class="active"><a href="/">首页</a></li>
                <li><a href="#">天天特惠</a></li>
                <li><a href="#">限时秒杀</a></li>
                <li><a href="#">会员专区</a></li>
                <li><a href="<?php echo U('Goods/exchangeGoods');?>">兑换中心</a><div class="nav_hot"></div></li>
                <li><a href="<?php echo U('Lottery/index');?>" target="_blank">幸运大转盘</a></li>
                <li><a href="<?php echo U('Construct/index');?>">诚佰跑跑团</a></li>
                <li><a href="<?php echo U('Construct/index');?>">诚佰帮帮团</a></li>
            </ul>
        </div>
    </div>
</div>
</div>

<div class="container">
<ul class="breadcrumb" style="height: 20px;">
  <li><a href="/">首页</a> <span class="divider">/</span></li>
  <li><a href="<?php echo U('Category/categoryList',array('cat_id'=>$breadcrumb['cat_id']));?>"><?php echo ($breadcrumb["cat_name"]); ?></a> <span class="divider">/</span></li>
  <li class="active"><?php echo ($goods["goods_name"]); ?></li>
</ul>
</div>

<style type="text/css">
    .content{width:1200px; margin:5px auto;}
    .content .pro-info{width:100%; height:650px;padding:5px; margin:10px;}
    .content .pro-info .info-left{width:400px; height:650px; float:left;}
    .content .pro-info .info-left .left-top img{width:400px; height:500px;}
    .content .pro-info .info-left .left-bottom ul{width:400px; margin:0px; padding:0px; float:left;}
    .content .pro-info .info-left .left-bottom ul li{float:left; display:block;width:100px; height:150px; overflow:hidden;}
    .content .pro-info .info-left .left-bottom ul li img{width:100px; height:150px;}
    .content .pro-info .info-right{width:780px; height:650px; float:right; padding:10px;}
    .content .pro-info .info-right .pro-name{width:700px; float:left; margin:10px auto; overflow:hidden;}
    .content .pro-info .info-right .pro-name table{background-color:#FAFAFA; margin-left:-2px; margin-top:-2px;}
    .content .pro-info .info-right .pro-name tr{width:700px;height:30px;}
    .content .pro-info .info-right .pro-name td{height:30px; line-height:30px;}
    .content .pro-info .info-right .pro-name td.text{width:700px; text-align:center; font-size:18px; line-height:30px; background-color:#FFF;}
    .content .pro-info .info-right .pro-name td.text span{color:#F00; font-size:18px;}
    .content .pro-info .info-right .pro-name td.text1{width:120px; padding-left:20px;font-size:14px;}
    .content .pro-info .info-right .pro-name td.text2{width:580px; text-align:left; font-size:14px; color:#F00;}
    .content .pro-info .info-right .pro-name td.text3{font-size:14px;text-align:center; color:#888;}
    #myTab{width:760px; overflow:hidden; margin-top:20px;}
    #myTab li{list-style-type:none; line-height:50px;font-size:18px; border-bottom:#CCC 1px dashed; width:380px;}
    #myTab li a{color:#39F;}
    #myTab li a:hover{background:none;}
    #myTab .active{width:380px; float:left; text-align:center;}
    #myTab .active:visited{width:380px;}
    #myTab li {width:380px; float:left; text-align:center;}
    #myTab li a span{color:#F00; font-size:20px;}
    .tab-content{width:760px; height:150px; overflow:hidden;}
    #home p{font-size:14px; color:#333;}
    #home p span{font-size:18px;}
    #profile ul{width:100%;}
    #profile ul li{width:760px; line-height:20px; padding:0 5px;display:block;}
    .buy{width:760px; float:left;}
    .buy .input{width:760px; padding:5px 50px;float: left;}
    .buy .input span{display:block; float:left; width: 20px;float: left;margin-top: 5px;margin-left: 5px;}
    .buy .stock{ width:500px; text-align:left;float:left; margin-left:50px;}
    .buy .stock span{color:#F00; line-height:30px;}
    .buy-now{width:760px; float:left; text-align:center; margin:20px 10px;}
    .buy-now a{width:380px; float:left; font-size:20px; color:#F00; text-align:center;}
    .buy-now #shopcart{width:380px; float:left;}
    .recommend{width:1200px; margin:20px auto;}
    .recommend .tit{width:1200px; height:30px; line-height:30px;}
    .recommend .tit span{width:200px; text-align:center;display:block;font-size:18px;  float:left; margin:5px 15px;}
    .recommend .tit .xian{float:right; width:940px; height:1px; background-color:#666; margin-top:22px;}
    .recommend ul{width:1200px; overflow:hidden; margin:10px;}
    .recommend ul li{width:250px; margin-left:40px; float:left;}
    .recommend ul li .img{width:250px; height:300px;}
    .recommend ul li .t-text{width:250px; height:50px; overflow:hidden;}
    .recommend ul li .t-text span{float:left; display:block; width:250px; font-size:16px; line-height:20px; text-align:center;}
    .recommend ul li .t-text .price{color:#F00;}
    .details ul {width:1200px; margin:10px auto;}
    .details ul li{list-style-type:none; line-height:50px; text-align:center;font-size:18px; border-bottom:#CCC 1px dashed; width:200px;}
    .goods-tab-content{width:760px; overflow:hidden;}

</style>
<div class="content">
    <div class="pro-info">
        <div class="info-left">
            <div id="goods_carousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#goods_carousel" data-slide-to="0" class="active"> </li>
                    <?php if(is_array($goods_gallery)): foreach($goods_gallery as $k=>$gallery): ?><li data-target="#goods_carousel" data-slide-to="<?php echo ($k+1); ?>"></li><?php endforeach; endif; ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="/Uploads/<?php echo ($goods["goods_img"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" />
                        <div class="carousel-caption">
                            <?php echo ($goods["goods_name"]); ?>
                        </div>
                    </div>
                    <?php if(is_array($goods_gallery)): foreach($goods_gallery as $k=>$gallery): ?><div class="item">
                            <img src="/Uploads/<?php echo ($gallery["img_url"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" />
                            <div class="carousel-caption">
                                <?php echo ($goods["goods_name"]); ?>
                            </div>
                        </div><?php endforeach; endif; ?>
                    </if>
                </div>
            </div>
            <div class="gallery-jumb">
                <div class="item active">
                    <a href="#goods_carousel" data-slide-to="<?php echo ($k); ?>">
                        <img src="/Uploads/<?php echo ($goods["goods_thumb"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" />
                    </a>
                </div>
                <?php if(is_array($goods_gallery)): foreach($goods_gallery as $k=>$gallery): ?><div class="item">
                        <a href="#goods_carousel" data-slide-to="<?php echo ($k+1); ?>">
                            <img src="/Uploads/<?php echo ($gallery["thumb_url"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" />
                        </a>
                    </div><?php endforeach; endif; ?>
            </div>
            <div class="pt10 pb20 clearfix">
                <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">人人网</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a></div>
                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            </div>
        </div>
        <div class="info-right">
            <div class="pro-name">
                <table width="704" border="0" frame="void">
                    <tr>
                        <td class="text" colspan="2"><span>产品名称：</span><?php echo ($goods["goods_name"]); ?></td>
                    </tr>
                    <tr>
                        <td class="text1">价格：</td>
                        <td class="text2"><?php echo ($goods["market_price"]); ?></td>
                    </tr>
                    <tr>
                        <td class="text1">促销价：</td>
                        <td class="text2"><?php echo ($goods["goods_price"]); ?></td>
                    </tr>
                    <tr>
                        <td class="text1">配送方式：</td>
                        <td class="text2">订购时联系客服确认</td>
                    </tr>
                    <tr>
                        <td class="text3" colspan="2">（上午11点之前下单当天发货，11点之后次日发货，周五11点之后下单统一在下周一发货）</td>
                    </tr>
                </table>

            </div>
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#tab-description" data-toggle="tab">兑换所需积分：<span><?php echo ($goods["integral"]); ?></span></a></li>
                <li class="static"><a href="#tab-comments" data-toggle="tab">评价：<span><?php echo ($comments["count"]); ?></span></a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab-description">
                    <!--description-->
                    <p>
                        <span>产品介绍：</span><?php echo ($goods["goods_brief"]); ?>
                    </p>
                </div>
                <div class="tab-pane" id="tab-comments">
                    <!--comments-->
                    <?php if($comments == ''): ?><p class="mb10 pt10">现在还没有评论.</p>
                        <?php else: ?>
                        <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="/Public/Home/images/avatar-40.png">
                                    <p class="pt5"><?php echo ($comment["user_name"]); ?></p>
                                </a>
                                <div class="media-body">
                                    <p class="media-heading"></p>

                                    <div class="media grey">
                                        <p><?php echo ($comment["content"]); ?></p>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
            </div>

            <div class="buy">
                <form action="<?php echo U('Cart/addToCart');?>" method="post">
                <div class="input">
                    <p>
                    <span class="icon-minus cart-minus"></span>
                    <input type="text" name="quantity" value="1" onKeypress="return (/[\d.]/.test(String.fromCharCode(event.keyCode)))" class="cart-input" style=" width:26px; height:16px; border:1px solid #e7e3e2; text-align:center; color:#999; float:left;">
                    <span class="icon-plus cart-plus"></span>
                    </p>
                </div>
                <div class="stock">库存<span><?php echo ($goods["goods_number"]); ?></span>件</div>
                <div class="buy-now">
                    <input type="hidden" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>" />
                    <button type="submit" id="shopcart" class="btn btn-danger">放入购物车</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="recommend">
        <div class="tit"><span>相关产品推荐</span><span class="xian">..</span></div>
        <ul>
            <?php if(is_array($related_goods_list)): $i = 0; $__LIST__ = array_slice($related_goods_list,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$related_goods): $mod = ($i % 2 );++$i;?><li>
                <div class="img"><img src="/Uploads/<?php echo ($related_goods["goods_img"]); ?>" style="width:250px;height:300px"></div>
                <div class="t-text"><span class="text"><?php echo ($related_goods["goods_name"]); ?></span><span class="price"><?php echo ($related_goods["goods_price"]); ?></span></div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="details">
        <ul class="nav nav-tabs" id="goods_detail_tab">
            <li class="active"><a href="#tab-details" data-toggle="tab">商品详情</a></li>
            <li><a href="#tab-all-comments" data-toggle="tab">累计评价<span><?php echo ($comments["count"]); ?></span></a></li>
            <li><a href="#tab-deal" data-toggle="tab">月成交记录<span><?php echo ($order["count"]); ?></span>件</a></li>
        </ul>
        <div class="tab-content goods-tab-content">
            <div class="tab-pane active" id="tab-details">
                <?php echo (htmlspecialchars_decode(html_entity_decode($goods["goods_desc"]))); ?>
            </div>
            <div class="tab-pane" id="tab-all-comments">
                <!--comments-->
                <?php if($comments == ''): ?><p class="mb10 pt10">现在还没有评论.</p>
                    <?php else: ?>
                    <?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><div class="media bbdashed">
                            <a class="pull-left" href="#">
                                <img class="media-object img-circle" src="/Public/Home/images/avatar-40.png">
                                <p class="pt5"><?php echo ($comment["user_name"]); ?></p>
                            </a>
                            <div class="media-body">
                                <p class="media-heading"></p>

                                <div class="media grey">
                                    <p><?php echo ($comment["content"]); ?></p>
                                </div>
                            </div>
                        </div><?php endforeach; endif; endif; ?>
            </div>
            <div class="tab-pane" id="tab-deal">

            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class=" w1200_2 m0auto">
        <div class="S-link">
            <ul>
                <li>
                    <a href="#" class="text7"><img src="/Public/Home/images/bg_public_1.jpg"></a>
                    <a href="#" title="用户协议" class="text8">用户协议</a>
                    <a href="#" title="常见问题" class="text8">常见问题</a>
                    <a href="#" title="网站购物流程" class="text8">网站购物流程</a>
                    <a href="#" title="会员制度" class="text8">会员制度</a>
                    <a href="#" title="VIP客户与合作" class="text8">VIP客户与合作</a>
                </li>
                <li>
                    <a href="#" class="text7"><img src="/Public/Home/images/bg_public_2.jpg"></a>
                    <a href="#" title="如何付款" class="text8">如何付款</a>
                    <a href="#" title="发票制度说明" class="text8">发票制度说明</a>
                    <a href="#" title="电子券说明" class="text8">电子券说明</a>
                    <a href="#" title="虚拟账户支付" class="text8">虚拟账户支付</a>
                    <a href="#" title="商品优惠代码说明" class="text8">商品优惠代码说明</a>
                </li>
                <li>
                    <a href="#" class="text7"><img src="/Public/Home/images/bg_public_3.jpg"></a>
                    <a href="#" title="配送收费标准" class="text8">配送收费标准</a>
                    <a href="#" title="配送时间" class="text8">配送时间</a>
                    <a href="#" title="货到付款支持城市" class="text8">货到付款支持城市</a>
                </li>
                <li>
                    <a href="#" class="text7"><img src="/Public/Home/images/bg_public_4.jpg"></a>
                    <a href="#" title="如何办理退换货" class="text8">如何办理退换货</a>
                    <a href="#" title="如何退款" class="text8">如何退款</a>
                    <a href="#" title="联系客服" class="text8">联系客服</a>
                </li>
                <li>
                    <a href="#" class="text7"><img src="/Public/Home/images/bg_public_5.jpg"></a>
                    <a href="#" title="了解搜酒坊" class="text8">了解诚佰商城</a>
                    <a href="#" title="加入我们" class="text8">加入我们</a>
                    <a href="#" title="联系我们" class="text8">联系我们</a>
                    <a href="#" title="隐私声明" class="text8">隐私声明</a>
                    <a href="#" title="友情链接" class="text8">友情链接</a>
                </li>
            </ul>
        </div>
        <div class="clr"></div>
        <div class="T-link">
            <img src="/Public/Home/images/footer_4.png">
        </div>
        <style type="text/css">
                                                       
        </style>
        <div class="w1200_2 m0auto footer-2015">
            <div class="links">
                <a href="http://www.jd.com/intro/about.aspx" target="_blank" rel="nofollow">诚佰官网</a>
                |
                <a href="http://www.jd.com/contact/" target="_blank" rel="nofollow">招商加盟</a>
                |
                <a href="http://www.jd.com/contact/joinin.aspx" target="_blank" rel="nofollow">商家入驻</a>
                |
                <a href="http://jzt.jd.com" target="_blank" rel="nofollow">联系我们</a>
                |
                <a href="http://app.jd.com/" target="_blank" rel="nofollow">关于我们</a>
                |
                <a href="http://club.jd.com/links.aspx" target="_blank">友情链接</a>
            </div>
            <div class="copyright">
                长春市公安局朝阳分局备案编号XXXXX  |  京ICP证XXXXX号  |  <a href="#">互联网药品信息服务资格证编号(京)-经营性-XXXX</a>  |  
                <a href="#">音像制品经营许可证苏宿批XXX号</a>  |  出版物经营许可证编号新出发(苏)批字第N-012号  |  互联网出版许可证编号新出网证(京)字150号<br>
                网络文化经营许可证京网文XXXX号  违法和不良信息举报电话：XXXXXXXXX  Copyright © 2004-2015  诚佰chengbai315.com 版权所有<br>
            </div>
        </div>
        <div class="T-logo m0auto">
            <ul>
                <li>
                    <a href="#"><img src="/Public/Home/images/foot01_01.png" alt="" title=" " height="51" width="137"></a>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/foot01_02.png" alt="" title=" " height="51" width="137"></a>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/foot01_03.png" alt="" title=" " height="51" width="137"></a>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/foot01_04.png" alt="" title=" " height="51" width="137"></a>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/foot01_05.png" alt="" title=" " height="51" width="137"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
   
<div id="back-to-top">
    <a href="#"><img src="/Public/Home/images/to-top.png" /></a>
</div>
<script src="/Public/Home/js/common.js"></script>
</body>
</html>