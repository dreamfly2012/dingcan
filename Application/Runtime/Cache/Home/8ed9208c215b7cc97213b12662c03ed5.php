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

<!-- Container -->
<div class="container">
    <div class="span12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>收货信息</span> 
            </div>
            <div class="panel-body">
                <label class="billing">配送区域: <abbr>*</abbr></label>
                
                <select id="sel_province">
                    <option value="0">请选择</option>
                    <?php if(is_array($provinces)): $i = 0; $__LIST__ = $provinces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$province): $mod = ($i % 2 );++$i;?><option value="<?php echo ($province["region_id"]); ?>"><?php echo ($province["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
             
                <select id="sel_city">
                    <option value="0">请选择</option>
                    <?php if(is_array($cities)): $i = 0; $__LIST__ = $cities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i;?><option value="<?php echo ($city["region_id"]); ?>"><?php echo ($city["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
               
                <select id="sel_district">
                    <option value="0">请选择</option>
                    <?php if(is_array($districts)): $i = 0; $__LIST__ = $districts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$district): $mod = ($i % 2 );++$i;?><option value="<?php echo ($district["region_id"]); ?>"><?php echo ($district["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>

                <div>
                    <label>姓名: <abbr>*</abbr></label>
                    <input type="text" placeholder="" value="" />
                </div>
                <div>
                    <label>邮编:<abbr>*</abbr></label>
                    <input type="text" placeholder="" value="" />
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
 
    <!-- Checkout Cart -->
    <div class="span6">
        <div class="panel panel-default">
            <div class="panel-heading">
                购物车
            </div>
            <div class="panel-body">
                <table class="table table-hover table-response table-striped">
                    <tbody>
                        <tr>
                            <th>商品</th>
                            <th>单价</th>
                            <th>数量</th>
                            <th>小计</th>
                        </tr>

                        <?php if(is_array($cart_info)): $i = 0; $__LIST__ = $cart_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?><tr class="st-new-item">
                                <td>
                                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$goods['goods_id']));?>">
                                        <?php echo ($cart["goods_name"]); ?>
                                    </a>
                                    <img src="/Public/<?php echo ($cart["goods_thumb"]); ?>" alt="<?php echo ($cart["goods_name"]); ?>" width="100" height="100">
                                </td>
                           
                                <td class="st-val"><?php echo ($cart["goods_price"]); ?></td>
                            
                                <td class="st-val"><?php echo ($cart["goods_number"]); ?></td>
                                <td class="st-val"><?php echo ($cart["subtotal_price"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                        <tr>
                            <th class="checkout-totals">
                                <div class="checkout-subtotal">
                                    总计: <span><?php echo ($cart["total_price"]); ?></span>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
</div>
<!-- Container / End -->
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