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

	<div class="col-md-6 col-sm-12 col-xs-12">
		<!--地址信息- -->
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <a href="<?php echo U('Order/checkout');?>">
	                <div class="checkout-section"><span>1</span> 地址信息 <strong><i class="fa fa-edit"></i>编辑</strong> </div>
	            </a>
	        </div>

	        <div class="panel-body">
	            <div class="col-md-6 col-sm-12 col-xs-12">
	                <ul class="list-group">
	                    <li class="list-group-item active"><strong>送货位置</strong></li>
	                    <li class="list-group-item">吉林省</li>
	                    <li class="list-group-item">长春市</li>
	                    <li class="list-group-item">高新区</li>
	                    <li class="list-group-item">修正路232号101栋2楼504</li>
	                </ul>
	            </div>
	            <div class="col-md-6 col-sm-12 col-xs-12">
	                <ul class="list-group">
	                    <li class="list-group-item active"><strong>联系电话</strong></li>
	                    <li class="list-group-item">15888888888</li>
	                </ul>
	            </div>
	        </div>
	    </div>

		<!-- 支付信息 -->
	    <div class="panel panel-success">
			<div class="panel-heading">
				<span>2</span> 运送方式
			</div>
			<div class="panel-body">
				<ul class="list-group">
	                <li class="list-group-item active"><strong>支付方式</strong></li>
	                <li class="list-group-item">
	                <form action="#">
	                    <div class="delivery-option">
	                        <input id="shipping-address" type="radio" name="shipping-address" value="1">
	                        <label for="shipping-address" class="checkbox">支付宝 <span>$9.99 <abbr class="sep">|</abbr> Delivery in 3 to 5 Business Days</span></label>
	                    </div>
	                </form>
	                </li>
	            </ul>
	        </div>
        </div>

        <div class="panel panel-warning">
            <div class="panel-heading">
                <a href="<?php echo U('Order/payOrder');?>">继续</a>
            </div>
        </div>

		<div class="panel panel-warning">
			<a href="<?php echo U('Order/payOrder');?>">
	            <div class="panel-heading">
	                <span>3</span> 确认支付
	            </div>
            </a>
		</div>

	</div>




	<!-- CHeckout Content / End -->


	<!-- 购物车信息 -->
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="checkout-section cart">购物车</div>
			</div>
			<div class="panel-body">
				<table class="checkout table table-hover table-striped">
					<tbody>
						<tr>
							<th class="hide-on-mobile">Item</th>
							<th></th>
							<th>Price</th>
							<th>Qty</th>
							<th>Total</th>
						</tr>
								
						<!-- Item #1 -->
						<tr>
							<td class="hide-on-mobile"><img src="./Trizzy_delivery_files/small_product_list_08.jpg" alt=""></td>
							<td class="cart-title"><a href="http://vasterad.com/themes/trizzy/checkout-delivery.html#">Converse All Star Trainers</a></td>
							<td>$79.00</td>
							<td class="qty-checkout">1</td>
							<td class="cart-total">$79.00</td>
						</tr>

						<!-- Item #2 -->
						<tr>
							<td class="hide-on-mobile"><img src="./Trizzy_delivery_files/small_product_list_09.jpg" alt=""></td>
							<td class="cart-title"><a href="http://vasterad.com/themes/trizzy/checkout-delivery.html#">Wool Two-Piece Suit</a></td>
							<td>$99.00</td>
							<td class="qty-checkout">1</td>
							<td class="cart-total">$99.00</td>
						</tr>
						<tr>
							<th class="checkout-totals">
								<div class="checkout-subtotal">
									Subtotal: <span>$178.00</span>
								</div>
							</th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!DOCTYPE html>
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