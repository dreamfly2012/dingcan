<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>巨搜商店</title>
    <!--文件引入顺序非常重要-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Home/css/common.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="http://cdn.bootcss.com/holder/2.6.0/holder.min.js"></script>
    <script type="text/javascript">
	//购物车URL
	var __ADD_TO_AJAX_CART_URL__ = "<?php echo U('Cart/addToAjaxCart');?>";
	var __ADD_TO_CART_URL__ = "<?php echo U('');?>";
	var __ADD_GOODS_TO_COLLECT_URL = "<?php echo U('User/addGoodsToCollect');?>";
	var __ADD_STORE_TO_COLLECT_URL = "<?php echo U('User/addStoreToCollect');?>";


</script>
</head>
<body>
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <!-- 手机显示导航 -->
                <a class="btn btn-navbar ml10" style="float:left;padding-left: 5px;" data-toggle="collapse" data-target=".navbar-collapse-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-collapse-user">
                    <i class="icon-user icon-white"></i>
                </a>
            
                <div class="collapse nav-collapse navbar-collapse-nav">
                    <ul class="nav navbar-nav">
                        <!-- 导航信息-->
                        <?php if(is_array($nav)): foreach($nav as $key=>$item): if($item['children']): ?>
                            <li class="dropdown-menu">
                                <a href="<?php echo ($item["url"]); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo ($item["name"]); ?> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if(is_array($item["children"])): foreach($item["children"] as $key=>$itemchild): ?><li><a href="<?php echo ($itemchild["url"]); ?>"><?php echo ($itemchild["name"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li>
                                <a href="<?php echo ($item["url"]); ?>"><?php echo ($item["name"]); ?></a>
                            </li>
                            <?php endif; endforeach; endif; ?>
                    </ul>
                </div>
                <div class="collapse nav-collapse navbar-collapse-user">
                    <ul class="nav navbar-nav" style="float:right;">
                        <li>
                            <a href="<?php echo U('User/Index');?>">个人中心</a>
                        </li>
                            
                        <li>
                            <a href="<?php echo U('Cart/Index');?>">购物车</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/Collect');?>">收藏</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/logout');?>">登出</a>
                        </li>
                    </ul>
                </div>
                
                <form action="<?php echo U('Search/searchGoods');?>" class="navbar-form pull-right" method="post" role="search">
                    <input type="text" name="goods_name" class="span4" placeholder="搜索">
                    <button type="submit" class="btn btn-default"><span class="icon-search"></span></button>
                </form>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <h2>巨搜商城</h2>

            <ul class="breadcrumb">
                <li><a href="<?php echo U('Index/index',array('store_id',$store_config.store_id));?>"><?php echo ($store_config["store_name"]); ?></a></li>
                <li><a href="<?php echo U('Goods/showCategory',array('category'=>$goods['goods_cat']));?>"><?php echo ($goods["goods_category"]); ?></a></li>
                <li><?php echo ($goods["goods_name"]); ?></li>
            </ul>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span6 pl20">
            <div id="myCarousel" class="carousel slide" style="width:300px;height: 300px;">
                <ol class="carousel-indicators">
                    <?php if(is_array($goods_gallery)): foreach($goods_gallery as $k=>$gallery): ?><li data-target="#carousel-example-generic" data-slide-to="<?php echo ($k); ?>" class="active"></li><?php endforeach; endif; ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php if(is_array($goods_gallery)): foreach($goods_gallery as $k=>$gallery): ?><div class="item <?php if($k == 0): ?>active<?php endif; ?>">
                            <img src="/Uploads/<?php echo ($gallery["img_url"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" class="img-responsive img-thumbnail">
                            <div class="carousel-caption">
                            </div>
                        </div><?php endforeach; endif; ?>
                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                <!-- Share Buttons -->
            </div>
            <div class="pt10 pb20">
                    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">人人网</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a></div>
                    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            </div>
            <div class="gallery-jumb">
                <?php if(is_array($goods_gallery)): foreach($goods_gallery as $k=>$gallery): ?><div class="item <?php if($k == 0): ?>active<?php endif; ?>">
                        <a href="#myCarousel" data-slide-to="<?php echo ($k); ?>">
                            <img src="/Uploads/<?php echo ($gallery["thumb_url"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" class="img-responsive img-thumbnail">
                        </a>
                    </div><?php endforeach; endif; ?>
            </div>
        </div>
        
        <div class="span6">
           
            <h2><?php echo ($goods["goods_name"]); ?></h2>

            <p><strong>库存:</strong><span class="pl10"><?php echo ($goods["market_price"]); ?></span></p>
            <p><strong>价格:</strong><s class="pl10"><?php echo ($goods["market_price"]); ?></s></p>
            <p><strong>促销:</strong><span class="pl10"><?php echo ($goods["shop_price"]); ?></span></p>
            
            <p class="pt10 pb10"><?php echo ($goods["goods_brief"]); ?></p>

            <p>
                <strong>数量:</strong>
                <span class="icon-minus cart-minus"></span>
                <input type="text" name="quantity" value="1"  onKeypress="return (/[\d.]/.test(String.fromCharCode(event.keyCode)))" class="cart-input">
                <span class="icon-plus cart-plus"></span>
                <p>
                    <a href="javascript:;" class="btn btn-success direct_buy">立即购买</a>
                    <a href="javascript:;" class="btn btn-success add_to_cart">加入购物车</a>
                </p>
            </p>
           
        </div>
    </div>
</div>


<div class="container">
    <div class="span12 pt30">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">商品详情</a></li>
                <li><a href="#tab2" data-toggle="tab">商品评论</a></li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab1">
                    <p><?php echo ($goods["desc"]); ?></p>
                </div>    

                <div role="tabpanel" class="tab-pane" id="tab2">

                    <!-- 用户评论 -->
                    <section class="comments">
                        <?php if($comments): ?><p class="mb10 pt10">现在还没有评论.</p><?php endif; ?>


                        <?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><div class="media">
                          <a class="pull-left" href="#">
                            <img class="media-object img-circle" data-src="holder.js/64x64">
                            <p class="pt5"><?php echo ($comment["user_name"]); ?></p>
                          </a>
                          <div class="media-body">
                            <p class="media-heading"></p>
                            
                            <div class="media grey">
                               <p>2015年03月29日 12:12 颜色分类:黄色  尺码:35</p>
                            </div>
                          </div>
                        </div><?php endforeach; endif; ?>
                    </section>
                </div>
            </div>
    </div>
</div>

<!-- 相关产品 -->
<div class="container mt5">
    <div class="span12">
        <h3 class="page-header">相关产品</h3>
    </div>

    <div class="row-fluid">
        <?php if(is_array($related_goods_list)): $i = 0; $__LIST__ = array_slice($related_goods_list,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$related_goods): $mod = ($i % 2 );++$i;?><div class="span3">
            <div class="media">
                <div class="media-top">
                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$related_goods['goods_id']));?>">
                        <img class="media-object  img-responsive" src="/Public/<?php echo ($related_goods["goods_img"]); ?>" alt="<?php echo ($related_goods["goods_name"]); ?>">
                    </a>
                </div>
                <div class="media-body">
                    <span class="product-category"><?php echo ($related_goods["goods_name"]); ?></span>
                    <h5><?php echo ($related_goods["goods_brief"]); ?></h5>
                    <span class="product-price"><?php echo ($goods["goods_price"]); ?></span>
                </div>
                <div class="media-bottom">
                    <a href="javascript:;" class="product-button add_to_cart"><i class="icon-shopping-cart"></i> 添加到购物车</a>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>


<section>
    <div class="container footer">
        <div class="row-fluid">
            <div class="span12">
                <p class="text-center">
                    <img src="/Uploads/test/logo-small.png" alt="Modello-Logo" style="display:inline-block"/>
                </p>
            </div>
        </div>

        <div class="row-fluid">

            <div class="span3 text-center">
                <h4>联系我们</h4>

                <div class="content">
                    <p class="bold">巨搜网络</p>
                    <p>
                        长春市湖西路市民大厦
                        <br>+400 400 400
                        <br>test@test.test
                    </p>

                    <div>
                        <ul class="list-no-style">
                            <li>
                                <a href="#" class="fa fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-dribbble "></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-google-plus "></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="span3 text-center">
                <h4>节日促销</h4>

                <div>
                    <ul class="list-no-style">
                        <li class="row-fluid">
                            <div class="thumb span3">
                                <a href="#"><img alt="" src="/Uploads/test/product02-sq.jpg" /></a>
                            </div>
                            <div class="body span9">
                                <h5><a href="#">时尚背包</a></h5>
                                <div class="price">
                                    <span class="previous-price">220.00￥</span>
                                    <span>189.00￥</span>
                                </div>
                            </div>
                        </li>

                        <li class="row-fluid">
                            <div class="thumb span3">
                                <a href="#"><img alt="" src="/Uploads/test/product06-sq.jpg" /></a>
                            </div>
                            <div class="body span9">
                                <h5><a href="product-single-fullwidth.html">皮绒裤子</a></h5>
                                <div class="price">
                                    <span class="previous-price">220.00￥</span>
                                    <span>189.00￥</span>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="span3 text-center">
                <h4>新款衣服</h4>

                <div class="content">
                    <ul class="list-no-style">
                        <li class="row-fluid">
                            <div class="thumb span3">
                                <a href="#"> <img alt="" src="/Uploads/test/product05-sq.jpg" /></a>
                            </div>
                            <div class="body span9">
                                <h5><a href="product-single-fullwidth.html">滑雪裤</a></h5>
                                <div class="price">
                                    <span class="previous-price">220.00￥</span>
                                    <span>189.00￥</span>
                                </div>
                            </div>
                        </li>

                        <li class="row-fluid">
                            <div class="thumb span3">
                                <a href="product-single-fullwidth.html"> <img alt="" src="/Uploads/test/product04-sq.jpg" /></a>
                            </div>
                            <div class="body span9">
                                <h5><a href="product-single-fullwidth.html">红色上衣</a></h5>
                                <div class="price">
                                    <span class="previous-price">220.00￥</span>
                                    <span>189.00￥</span>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="span3 text-center">
                <h4>关于我们</h4>

                <div>
                    <ul class="list-no-style">
                        <li>
                            <a href="">条款和调理</a>
                        </li>

                        <li>
                            <a href="">送货范围</a>
                        </li>
                        <li>
                            <a href="">安全支付</a>
                        </li>

                        <li>
                            <a href="">联系我们</a>
                        </li>

                        <li>
                            <a href="">退货说明</a>
                        </li>

                        <li>
                            <a href="">物流信息</a>
                        </li>
                        <li>
                            <a href="">售后服务</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12 text-center nav navbar-inverse">

                <ul class="list-inline">
                    <li>
                        <img alt="paypal" src="/Uploads/test/payments-paypal.png" />
                    </li>
                    <li>
                        <img alt="visa" src="/Uploads/test/payments-visa.png" />
                    </li>
                    <li>
                        <img alt="master card" src="/Uploads/test/payments-mastercard.png" />
                    </li>
                    <li>
                        <img alt="discover" src="/Uploads/test/payments-discover.png" />
                    </li>
                    <li>
                        <img alt="skrill" src="/Uploads/test/payments-skrill.png" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div id="back-to-top">
   <a href="#"><span class="glyphicon glyphicon-arrow-up"></span>返回顶部</a>
</div>
<script src="/Public/Home/js/common.js"></script>
</body>
</html>