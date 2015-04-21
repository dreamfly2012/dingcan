<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>巨搜商店</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Public/Home/css/jquery-ui.css" rel="stylesheet">
    <link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Home/css/common.css" rel="stylesheet">
    <script src="/Public/Home/js/jquery.min.js"></script>
    <script src="/Public/Home/js/jquery-ui.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
    <script src="/Public/Home/js/common.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle fl ml10" data-toggle="collapse" data-target=".navbar-collapse-nav">
                <span class="sr-only">导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-user">
                <span class="sr-only">个人信息</span>
                <span class="glyphicon glyphicon-user"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-user">
            <ul class="nav navbar-nav">
                <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">购物车<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li role="presentation">
                            <div class="col-md-6">
                                <a href="#">
                                    <img src="/Uploads/test/product01.jpg" alt="通用的占位符缩略图">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <p><span>鞋子</span></p>
                                <p><span>100￥</span></p>
                            </div>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation">
                            <div class="col-md-6">
                                <a href="#"><img src="/Uploads/test/product01.jpg" alt="通用的占位符缩略图"></a>
                            </div>
                            <div class="col-md-6">
                                <p><span>鞋子</span></p>
                                <p><span>100￥</span></p>
                            </div>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation" >
                            <a href="<?php echo U('Cart/showCart');?>">查看购物车</a>
                        </li>
                        <li role="presentation"  class="divider"></li>
                        <li role="presentation">
                            <a href="<?php echo U('Order/payOrder');?>">结算</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">收藏 <span>(2)</span></a></li>
                <li><a href="#">登出</a></li>
                <li><a href="#">个人中心</a></li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">网站导航<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                     <?php if(is_array($nav)): foreach($nav as $key=>$item): if($item['children']): ?>
                        <li class="dropdown">
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
                </li>
            </ul>
        </div>
        <div class="visible-xs">
            <div class="collapse navbar-collapse navbar-collapse-nav">
                <ul class="nav navbar-nav">
                    <?php if(is_array($nav)): foreach($nav as $key=>$item): if($item['children']): ?>
                        <li class="dropdown">
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
        </div>
        <form class="navbar-form" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </nav>
</div>

</div>
<!-- Container -->
<div class="container">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>1</span> 个人信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="billing">国家: <abbr>*</abbr></label>
                    <select class="form-control">
                        <option value="">请选择</option>
                        <option value="">中国</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="billing">省份: <abbr>*</abbr></label>
                    <select class="form-control">
                        <option value="">请选择</option>
                        <option value="">吉林</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="billing">城市: <abbr>*</abbr></label>
                    <select class="form-control">
                        <option value="">请选择</option>
                        <option value="">长春</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="billing">地区<abbr>*</abbr></label>
                    <select class="form-control">
                        <option value="">请选择</option>
                        <option value="">南关区</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>姓名: <abbr>*</abbr></label>
                    <input type="text" placeholder="" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>邮编:<abbr>*</abbr></label>
                    <input type="text" placeholder="" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email: <abbr>*</abbr></label>
                    <input type="text" placeholder="" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>电话号码: <abbr>*</abbr></label>
                    <input type="text" placeholder="" value="" class="form-control">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label for="shipping-address" class="checkbox">
                            <input id="shipping-address" type="checkbox" name="shipping-address" checked="checked" value="1">详细地址邮件发送的地址
                        </label>
                    </div>
                </div>
                <a href="<?php echo U('Order/delivery');?>" class="btn btn-success">继续</a>
                <a href="<?php echo U('Order/delivery');?>" class="btn">
                <div class="checkout-section"><span>2</span> Delivery</div>
                </a>
                <a href="<?php echo U('Order/payOrder');?>" class="btn">
                <div class="checkout-section"><span>3</span> 确认支付</div>
                </a>
            </div>
        </div>
    </div>
    <!-- Billing Details / Enc -->
    <!-- Checkout Cart -->
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                购物车
            </div>
            <div class="panel-body">
                <table class="table table-hover table-response table-striped">
                    <tbody>
                        <tr class="st-new-item">
                            <td>
                               <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$goods['goods_id']));?>">
                                    <?php echo ($goods["goods_name"]); ?>
                               </a>
                            </td>
                            <td>
                                <img src="/Public/Home/images/small_product_list_08.jpg" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td class="st-key">价格</td>
                            <td class="st-val">¥79.00</td>
                        </tr>
                        <tr>
                            <td class="st-key">数量</td>
                            <td class="st-val">1</td>
                        </tr>
                        <tr>
                            <td class="st-key">总计</td>
                            <td class="st-val">¥79.00</td>
                        </tr>

                        <tr class="st-new-item">
                            <td class="st-key"></td>
                            <td class="st-val st-head-row">
                                <img src="/Public/Home/images/small_product_list_09.jpg" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td class="st-key"></td>
                            <td class="st-val">
                                <a href="">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="st-key">价格</td>
                            <td class="st-val">¥99.00</td>
                        </tr>
                        <tr>
                            <td class="st-key">数量</td>
                            <td class="st-val">1</td>
                        </tr>
                        <tr>
                            <td class="st-key">总计</td>
                            <td class="st-val">¥99.00</td>
                        </tr>

                        <tr>
                            <th class="checkout-totals">
                                <div class="checkout-subtotal">
                                    总计: <span>¥178</span>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Checkout Cart / End -->
</div>
<!-- Container / End -->
<section>
    <div class="container footer">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    <img src="/Uploads/test/logo-small.png" alt="Modello-Logo" style="display:inline-block"/>
                </p>
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

<div id="back-to-top">
   <a href="#"><span class="glyphicon glyphicon-arrow-up"></span>返回顶部</a>
</div>
<script>
    var __CARTURL__ = "<?php echo U('Cart/showCart');?>";
</script>
</body>
</html>