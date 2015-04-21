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

<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

	<div class="eight columns">


	<!-- Checkout Content -->
	<a href="http://vasterad.com/themes/trizzy/checkout-billing-details.html"><div class="checkout-section"><span>1</span> Billing Details <strong><i class="fa fa-edit"></i>Edit</strong> </div></a>
	<div class="checkout-content">
	
	<div class="four columns alpha">
		<ul class="address-review">
			<li><strong>Billing Address</strong></li>
			<li>Mr. Walter C. Brown</li>
			<li>49 Featherstone Street</li>
			<li> London</li>
			<li> EC1Y 8SY</li>
			<li>United Kingdom</li>
		</ul>
	</div>
	<div class="four columns alpha omega">
		<ul class="address-review">
			<li><strong>Shipping Address</strong></li>
			<li>Same as Billing Address</li>
		</ul>
	</div>
	<div class="clearfix"></div>
	</div>
	

		<a href="http://vasterad.com/themes/trizzy/checkout-delivery.html"><div class="checkout-section"><span>2</span> Delivery <strong><i class="fa fa-edit"></i>Edit</strong> </div></a>
		<div class="checkout-delivery">

			<div class="eight columns alpha omega">
				<ul class="address-review delivery">
					<li><strong>Express Delivery <span class="delivery-summary">$14.99 <span class="sep">|</span> Delivery in 1 to 2 Business Days</span></strong></li>
				</ul>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>

			<div class="checkout-section active"><span>3</span> Payment &amp; Order Review</div>
			<div class="checkout-summary">
				<div class="eight columns alpha omega">
					<ul class="address-review summary">
						<li><strong>Credit Card</strong></li>
						<li>
							<ul class="payment-icons checkout">
								<li><img src="./Trizzy_pay_order_files/visa.png" alt=""></li>
								<li><img src="./Trizzy_pay_order_files/mastercard.png" alt=""></li>
								<li><img src="./Trizzy_pay_order_files/skrill.png" alt=""></li>
								<li><img src="./Trizzy_pay_order_files/moneybookers.png" alt=""></li>
								<li><img src="./Trizzy_pay_order_files/paypal.png" alt=""></li>
							</ul>
							<div class="clearfix"></div>
						</li>
						<li class="credit-card-fields">
							<span><label>Credit Card Number:</label><input type="text" value=""></span>

							<span><label>Month:</label>
							<select>
								<option value="">01</option>
								<option value="">02</option>
								<option value="">03</option>
								<option value="">04</option>
								<option value="">05</option>
								<option value="">06</option>
								<option value="">07</option>
								<option value="">08</option>
								<option value="">09</option>
								<option value="">10</option>
								<option value="">11</option>
								<option value="">12</option>
							</select></span>
							
							<span><label>Year:</label>
							<select>
								<option value="">2014</option>
								<option value="">2015</option>
								<option value="">2016</option>
								<option value="">2017</option>
								<option value="">2018</option>
							</select></span>
							<div class="clearfix"></div>
						</li>
					</ul>
				</div>
			</div>
	
			<a href="http://vasterad.com/themes/trizzy/checkout-payment-order-review.html#" class="continue button color">Place Order</a>

		</div>
		<!-- Checkout Content / End -->


	<!-- Checkout Cart -->
	<div class="eight columns">
		<div class="checkout-section cart">Shopping Cart</div>
		<!-- Cart -->
		<table class="stacktable small-only"><tbody><tr class="st-space"><td></td><td></td></tr><tr class="st-new-item"><td class="st-key"></td><td class="st-val st-head-row"><img src="./Trizzy_pay_order_files/small_product_list_08.jpg" alt=""></td></tr><tr><td class="st-key"></td><td class="st-val"><a href="http://vasterad.com/themes/trizzy/checkout-payment-order-review.html#">Converse All Star Trainers</a></td></tr><tr><td class="st-key">Price</td><td class="st-val">$79.00</td></tr><tr><td class="st-key">Qty</td><td class="st-val">1</td></tr><tr><td class="st-key">Total</td><td class="st-val">$79.00</td></tr><tr class="st-space"><td></td><td></td></tr><tr class="st-new-item"><td class="st-key"></td><td class="st-val st-head-row"><img src="./Trizzy_pay_order_files/small_product_list_09.jpg" alt=""></td></tr><tr><td class="st-key"></td><td class="st-val"><a href="http://vasterad.com/themes/trizzy/checkout-payment-order-review.html#">Wool Two-Piece Suit</a></td></tr><tr><td class="st-key">Price</td><td class="st-val">$99.00</td></tr><tr><td class="st-key">Qty</td><td class="st-val">1</td></tr><tr><td class="st-key">Total</td><td class="st-val">$99.00</td></tr></tbody></table><table class="checkout cart-table responsive-table stacktable large-only">

			<tbody><tr>
				<th class="hide-on-mobile">Item</th>
				<th></th>
				<th>Price</th>
				<th>Qty</th>
				<th>Total</th>
			</tr>
					
			<!-- Item #1 -->
			<tr>
				<td class="hide-on-mobile"><img src="./Trizzy_pay_order_files/small_product_list_08.jpg" alt=""></td>
				<td class="cart-title"><a href="http://vasterad.com/themes/trizzy/checkout-payment-order-review.html#">Converse All Star Trainers</a></td>
				<td>$79.00</td>
				<td class="qty-checkout">1</td>
				<td class="cart-total">$79.00</td>
			</tr>

			<!-- Item #2 -->
			<tr>
				<td class="hide-on-mobile"><img src="./Trizzy_pay_order_files/small_product_list_09.jpg" alt=""></td>
				<td class="cart-title"><a href="http://vasterad.com/themes/trizzy/checkout-payment-order-review.html#">Wool Two-Piece Suit</a></td>
				<td>$99.00</td>
				<td class="qty-checkout">1</td>
				<td class="cart-total">$99.00</td>
			</tr>

			</tbody></table>

			<!-- Apply Coupon Code / Buttons -->
			<table class="cart-table bottom">

				<tbody><tr>
				<th class="checkout-totals">
					<div class="checkout-subtotal">Subtotal: <span>$178.00</span></div><br>
					<div class="checkout-subtotal">Shipping &amp; Handling: <span>$14.99</span></div><br>
					<div class="checkout-subtotal summary">Order Total: <span>$192.99</span></div>
				</th>
				</tr>

			</tbody></table>
	</div>
	<!-- Checkout Cart / End -->


</div>
<!-- Container / End -->

<div class="margin-top-30"></div>


</div>

</div>



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