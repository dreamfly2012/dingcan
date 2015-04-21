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
            <div class="carousel slide" id="carousel-400728">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#carousel-400728" class="active"></li>
                    <li data-slide-to="1" data-target="#carousel-400728" class=""></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img alt="" src="/Uploads/test/slider-01-bg.png">
                        <div class="carousel-caption" contenteditable="true">
                            <h4>棒球</h4>
                            <p></p>
                        </div>
                    </div>
                    <div class="item"> <img alt="" src="/Uploads/test/slider-01-bg.png">
                        <div class="carousel-caption" contenteditable="true">
                            <h4>冲浪</h4>
                            <p></p>
                        </div>
                    </div>
                </div>
                <a data-slide="prev" href="#carousel-400728" class="left carousel-control">‹</a> 
                <a data-slide="next" href="#carousel-400728" class="right carousel-control">›</a>
            </div>
        </div>
    </div>

    <div class="row-fluid mt10">
        <div class="span6 mt5">
            <img src="/Uploads/test/banner-design-onsale.jpg" width="100%" />
        </div>
        <div class="span6 mt5">
            <img src="/Uploads/test/banner-freeshipping.jpg" width="100%" />
        </div>
    </div>

    
    <?php if(is_array($goods_list)): foreach($goods_list as $k=>$goods): if(($k%4) == 0): ?><div class="row-fluid pt10"><?php endif; ?>
        <div class="span3 pt15">
            <div class="text-center">
                <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$goods['goods_id']));?>">
                    <img src="/Uploads/<?php echo ($goods["goods_img"]); ?>" class="img-responsive"/>
                </a>
                <div class="goods-footer">
                <p class="text-center">
                <a href="javascript:;" class="add_to_cart" data-goods-id="<?php echo ($goods["goods_id"]); ?>">
                    <span class="icon-shopping-cart"></span>
                    添加到购物车
                </a>
                <a href="javascript:;" class="add_to_favourite" data-goods-id="<?php echo ($goods["goods_id"]); ?>"> 
                    <span class="icon-heart"></span>
                    添加到收藏
                </a>
                </p>
                <p class="text-center"><a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$goods['goods_id']));?>"><?php echo ($goods["goods_name"]); ?></a></p>
                <p class="text-center"><span class="product-price"><?php echo ($goods["goods_price"]); ?></span></p>
                </div>
            </div>
        </div>
        <?php if($k%4 == 3): ?></div><?php endif; endforeach; endif; ?>

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