<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>巨搜商店</title>
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
    <div class="header_middle w1200 m0auto of ">
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
                    <?php if(is_array($nav_categories)): foreach($nav_categories as $k=>$nav_category): ?><li style="border-top: 0px;" <?php if($k%2): ?>class="even"<?php endif; ?>>
                        <div class="cate-tag">
                            <strong><a href="<?php echo U('Category/categoryList',array('cat_id'=>$nav_category['cat_id']));?>"><?php echo ($nav_category["cat_name"]); ?></a></strong>
                        </div>
                        <div class="list-item hide">
                            <ul class="itemleft">
                                <dl>
                                    <dt>产品</dt>
                                    <dd>
                                    <?php if(is_array($nav_category['goods_list'])): foreach($nav_category['goods_list'] as $key=>$nav_goods): ?><a title="<?php echo ($nav_goods["goods_name"]); ?>" target="_blank" href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$nav_goods['goods_id']));?>"><?php echo ($nav_goods["goods_name"]); ?></a><?php endforeach; endif; ?>
                                    </dd>
                                </dl>
                            </ul>
                        </div>
                    </li><?php endforeach; endif; ?>
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
                <li><a href="#">诚佰跑跑团</a></li>
                <li><a href="#">诚佰帮帮团</a></li>
            </ul>
        </div>
    </div>
</div>
</div>

<!-- Container -->
<div class="container">
    <div>
        <div class="page-header">
            <a href="<?php echo U('Order/checkout');?>">
                <div class="checkout-section"><span>1</span> 地址信息 <strong><i class="fa fa-edit"></i>编辑</strong> </div>
            </a>
        </div>
        <div>
            <div>
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
                    <li class="list-group-item"></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="checkout-section cart">购物车</div>
            </div>
            <div class="panel-body">
                <table class="checkout table table-hover table-striped">
                    <tbody>
                    <tr>
                        <th class="hide-on-mobile">商品</th>
                        <th></th>
                        <th>价格</th>
                        <th>数量</th>
                        <th>小计</th>
                    </tr>

                    <!-- Item #1 -->
                    <tr>
                        <td class="hide-on-mobile"><img src="/Public/small_product_list_08.jpg" alt=""></td>
                        <td class="cart-title"><a href="">Converse All Star Trainers</a></td>
                        <td>¥79</td>
                        <td class="qty-checkout">3</td>
                        <td class="cart-total">¥237</td>
                    </tr>

                    <!-- Item #2 -->
                    <tr>
                        <td class="hide-on-mobile"><img src="./Trizzy_delivery_files/small_product_list_09.jpg" alt=""></td>
                        <td class="cart-title"><a href="http://vasterad.com/themes/trizzy/checkout-delivery.html#">Wool Two-Piece Suit</a></td>
                        <td>¥103</td>
                        <td class="qty-checkout">1</td>
                        <td class="cart-total">¥103</td>
                    </tr>
                    <tr>
                        <th class="checkout-totals">
                            <div class="checkout-subtotal">
                                总计: <span>$178.00</span>
                            </div>
                        </th>
                    </tr>
                    </tbody>
                </table>
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
                        <label for="shipping-address" class="checkbox">支付宝 <span>¥9.99 <abbr class="sep">|</abbr> 时间3-5天</span></label>
                    </div>
                </form>
                </li>
            </ul>
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

<section class="clearfix">
    <div class="footer">
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
    </div>
</section>
<div id="back-to-top">
    <a href="#"><span class="icon-arrow-up icon-2x"></span>返回顶部</a>
</div>
<script src="/Public/Home/js/common.js"></script>
</body>
</html>