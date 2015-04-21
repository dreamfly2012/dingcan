<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>巨搜商店</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Public/Home/dist/css/jquery-ui.css" rel="stylesheet">
    <link href="/Public/Home/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Home/dist/css/slippry.css" rel="stylesheet">
    <link href="/Public/Home/dist/css/common.css" rel="stylesheet">
    <script src="/Public/Home/dist/js/jquery.min.js"></script>
    <script src="/Public/Home/dist/js/bootstrap.min.js"></script>
    <!--<script src="/Public/Home/dist/js/jquery.lazyload.min.js"></script>-->
    <script src="/Public/Home/dist/js/jquery.scrollLoad.min.js"></script>
    <script src="http://cdn.bootcss.com/holder/2.4.1/holder.js"></script>
    <script src="/Public/Home/dist/js/slippry.min.js"></script>
    <script src="/Public/Home/dist/js/common.js"></script>
</head>

<body>

<header>
    <div class="container">
        <div class="row bg-grey">
            <div class="col-md-8">
                <ul class="top-header">
                    <li><span class="glyphicon glyphicon-earphone"></span> +400 12345678</li>
                    <li><span class="glyphicon glyphicon-envelope"></span>dreamfly@dreamfly.xyz</span></li>
                </ul>
            </div>
            <div class="col-md-4">

            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <img data-src="holder.js/100x100" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <ul class="addition-menu">
                        <li><a href="#">购物车</a></li>
                        <li><a href="#">收藏 <span>(2)</span></a></li>
                        <li><a href="#">登出</a></li>
                        <li><a href="#">个人中心</a></li>
                    </ul>
                </div>
                <div class="col-md-5">

                </div>
                <div class="col-md-7">
                    <!-- Search -->
                    <nav class="navbar navbar-default" role="navigation">
                        <div>
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                <ul class="nav nav-pills navbar-right">
                                    <li>&nbsp;</li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            购物车 <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="thumbnail">
                                                            <a href="#"><img src="/Uploads/test/product01.jpg"
                                                                alt="通用的占位符缩略图"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="caption">
                                                            <p><span>鞋子</span></p>
                                                            <p><span>100￥</span></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                            <li class="divider"></li>
                                            <li>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="thumbnail">
                                                            <a href="#"><img src="/Uploads/test/product01.jpg"
                                                                 alt="通用的占位符缩略图"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="caption">
                                                            <p><span>鞋子</span></p>
                                                            <p><span>100￥</span></p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">查看购物车</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#">结算</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">首页</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <?php if(is_array($nav)): foreach($nav as $key=>$nav): if($nav['children']): ?>
                            <li class="dropdown">
                                <a href="<?php echo ($nav["url"]); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo ($nav["name"]); ?> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if(is_array($nav["children"])): foreach($nav["children"] as $key=>$children): ?><li><a href="<?php echo ($children["url"]); ?>"><?php echo ($children["name"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo ($nav["url"]); ?>"><?php echo ($nav["name"]); ?></a>
                            </li>
                        <?php endif; endforeach; endif; ?>
                </ul>
            </div>
        </nav>
    </div>


</header>




<div class="container">
    <div class="row">
        <div class="carousel slide" id="carousel-400728">
            <ol class="carousel-indicators">
                <li data-slide-to="0" data-target="#carousel-400728" class="active"></li>
                <li data-slide-to="1" data-target="#carousel-400728" class=""></li>
                <li data-slide-to="2" data-target="#carousel-400728" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img alt="" src="/Uploads/test/slider-01-bg.png">
                    <div class="carousel-caption" contenteditable="true">
                        <h4>棒球</h4>
                        <p>棒球运动是一种以棒打球为主要特点，集体性、对抗性很强的球类运动项目，在美国、日本尤为盛行。</p>
                    </div>
                </div>
                <div class="item"> <img alt="" src="/Uploads/test/slider-01-bg.png">
                    <div class="carousel-caption" contenteditable="true">
                        <h4>冲浪</h4>
                        <p>冲浪是以海浪为动力，利用自身的高超技巧和平衡能力，搏击海浪的一项运动。运动员站立在冲浪板上，或利用腹板、跪板、充气的橡皮垫、划艇、皮艇等驾驭海浪的一项水上运动。</p>
                    </div>
                </div>
                <div class="item"> <img alt="" src="/Uploads/test/slider-01-bg.png">
                    <div class="carousel-caption" contenteditable="true">
                        <h4>自行车</h4>
                        <p>以自行车为工具比赛骑行速度的体育运动。1896年第一届奥林匹克运动会上被列为正式比赛项目。环法赛为最著名的世界自行车锦标赛。</p>
                    </div>
                </div>
            </div>
            <a data-slide="prev" href="#carousel-400728" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-400728" class="right carousel-control">›</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="/Uploads/test/banner-design-onsale.jpg" width="100%" />
        </div>
        <div class="col-md-6">
            <img src="/Uploads/test/banner-freeshipping.jpg" width="100%" />
        </div>
    </div>

    <div class="row">

        <?php if(is_array($goods)): foreach($goods as $key=>$goods): ?><div class="col-md-3">
                <div class="product-border">
                    <div class="product-holder">
                        <img src="/Uploads/<?php echo ($goods["goods_img"]); ?>" width="100%"/>
                        <span class="product-button">
                            <a href="javascript:;" class="add_to_cart">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                添加到购物车
                            </a>
                            <a href="javascript:;" class="add_to_favourite"> 
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                添加到收藏
                            </a>
                        </span>
                    </div>
                    <section class="product">
                        <span class="product-category"><?php echo ($goods["goods_category"]); ?></span>
                        <h5><a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$goods['goods_id']));?>"><?php echo ($goods["goods_name"]); ?></a></h5>
                        <span class="product-price"><?php echo ($goods["goods_price"]); ?></span>
                    </section>
                </div>
            </div><?php endforeach; endif; ?>
     
     </div>

</div>



<section>
    <div class="container footer">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="/Uploads/test/logo-small.png" alt="Modello-Logo" />
            </div>

            <div class="col-md-3 text-center">
                <h4>联系我们</h4>

                <div class="content">
                    <p class="bold">巨搜网络</p>
                    <p>
                        长春市湖西路市民大厦
                        <br>+400 400 400
                        <br>test@test.test
                    </p>

                    <div>
                        <ul class="list-unstyled">
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

            <div class="col-md-3 text-center">
                <h4>节日促销</h4>

                <div>
                    <ul class="list-unstyled">
                        <li class="row">
                            <div class="thumb col-xs-3">

                                <a href="product-single-fullwidth.html"><img alt="" src="/Uploads/test/product02-sq.jpg" /></a>
                            </div>
                            <div class="body col-xs-9">
                                <h5><a href="product-single-fullwidth.html">时尚背包</a></h5>
                                <div class="price">
                                    <span class="previous-price">220.00￥</span>
                                    <span>189.00￥</span>
                                </div>
                            </div>
                        </li>

                        <li class="row">
                            <div class="thumb col-xs-3">
                                <a href="product-single-fullwidth.html"><img alt="" src="/Uploads/test/product06-sq.jpg" /></a>
                            </div>
                            <div class="body col-xs-9">
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

            <div class="col-md-3 text-center">
                <h4>新款衣服</h4>

                <div class="content">
                    <ul class="list-unstyled">
                        <li class="row">
                            <div class="thumb col-xs-3">

                                <a href="product-single-fullwidth.html"> <img alt="" src="/Uploads/test/product05-sq.jpg" /></a>
                            </div>
                            <div class="body col-xs-9">
                                <h5><a href="product-single-fullwidth.html">滑雪裤</a></h5>
                                <div class="price">
                                    <span class="previous-price">220.00￥</span>
                                    <span>189.00￥</span>
                                </div>
                            </div>
                        </li>

                        <li class="row">
                            <div class="thumb col-xs-3">
                                <a href="product-single-fullwidth.html"> <img alt="" src="/Uploads/test/product04-sq.jpg" /></a>
                            </div>
                            <div class="body col-xs-9">
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

            <div class="col-md-3 text-center">
                <h4>关于我们</h4>

                <div>
                    <ul class="list-unstyled">
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

            <div class="col-md-12 text-center nav navbar-inverse">

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






</body>
</html>