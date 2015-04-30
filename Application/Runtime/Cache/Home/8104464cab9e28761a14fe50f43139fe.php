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
        <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script type="text/javascript">
	//购物车URL
	var __ADD_TO_AJAX_CART_URL__ = "<?php echo U('Cart/addToAjaxCart');?>";
	var __ADD_TO_CART_URL__ = "<?php echo U('Cart/addToCart');?>";
	var __ADD_GOODS_TO_COLLECT_URL = "<?php echo U('User/addGoodsToCollect');?>";
	var __ADD_STORE_TO_COLLECT_URL = "<?php echo U('User/addStoreToCollect');?>";


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
                        <li class="hou-list"><a href="">关注诚佰</a></li>
                        <li class="no-separate">客服热线：<font color="red">400-0431-918</font></li>
                    </ul>
                </div>
            </div>
        </div>

<div class="header wthrough" style="background: none;">
<div class="header_middle w1200 m0auto of ">
    <div id="logo" class="fleft">
        <a href="#"><img src="/Public/Home/images/logo.png" alt="诚佰" height="68" width="210"></a>
    </div>
    <div class="fleft logo_ad ml10">
    </div>
    <div class="search_warp fright ml35" style="margin-right:80px;">
        <div class="search">
            <form action="<?php echo U('Search/searchGoods');?>" method="post" name="searchForm" id="searchForm">
                <div class="input fleft"><input name="keywords" type="text"></div>
                <div class="submit fleft"><input value="搜 索" type="submit"></div>
            </form>
        </div>
        <div class="clr"></div>
        <div class="hot_keywords">
            热门搜索：
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>''));?>" target="_blank">酒鬼酒</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>''));?>" target="_blank">茅台</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>''));?>" target="_blank">汾酒</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>''));?>" target="_blank">洋河</a>&nbsp;
            <a href="<?php echo U('Search/searchGoods',array('goods_name'=>''));?>" target="_blank">郎酒</a>&nbsp;
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
            <div class="cateMenu">
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
                <li class="active"><a href="">首页</a></li>
                <li><a href="#">天天特惠</a></li>
                <li><a href="#">限时秒杀</a></li>
                <li><a href="#">会员专区</a></li>
                <li><a href="<?php echo U('Goods/exchangeGoods');?>">兑换中心</a><div class="nav_hot"></div></li>
                <li><a href="<?php echo U('Lottery/index');?>">幸运大转盘</a></li>
                <li><a href="#">诚佰跑跑团</a></li>
                <li><a href="#">诚佰帮帮团</a></li>
            </ul>
        </div>
    </div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="/Public/Home/css/exchange.css">
<!--兑换产品-->
<div class="listbox">
    <div class="pro-list">
        <div class="pro-title">
            <p class="order">热销商品</p>
        </div>
        <div class="pro-body">
            <ul>
                <?php if(is_array($hot_goods_list)): foreach($hot_goods_list as $key=>$hot_goods): ?><li>
                    <div class="pro-img">
                        <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>"><img src="/Uploads/<?php echo ($hot_goods["img"]); ?>" alt="<?php echo ($hot_goods["goods_name"]); ?>" height="180" width="180"></a>
                    </div>
                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>" class="font20">
                    <span class="exchange">消耗积分：:<?php echo ($hot_goods["integral"]); ?></span>
                    </a>
                    <p class="blacktext">
                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>" class="font20"></a>
                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>"><?php echo ($hot_goods["goods_name"]); ?></a>
                    </p>
                </li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <div class="pro-list">
        <div class="pro-title">
            <p class="order">排序：</p>
            <a class="active" href="<?php echo U('Goods/exchangeGoods',array('order'=>'add_time'));?>">按上架时间排序</a>
            <a class=" fl" href="<?php echo U('Goods/exchangeGoods',array('order'=>'integral'));?>">按积分排序</a>
        </div>
        <div class="pro-body">
            <ul>
                <?php if(is_array($hot_goods_list)): foreach($hot_goods_list as $key=>$hot_goods): ?><li>
                    <div class="pro-img">
                        <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>"><img src="/Uploads/<?php echo ($hot_goods["img"]); ?>" alt="<?php echo ($hot_goods["goods_name"]); ?>" height="180" width="180"></a>
                    </div>
                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>" class="font20">
                    <span class="exchange">消耗积分：:<?php echo ($hot_goods["integral"]); ?></span>
                    </a>
                    <p class="blacktext">
                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>" class="font20"></a>
                    <a href="<?php echo U('Goods/goodsDetail',array('goods_id'=>$hot_goods['goods_id']));?>"><?php echo ($hot_goods["goods_name"]); ?></a>
                    </p>
                </li><?php endforeach; endif; ?>
            </ul>
            <div class="b_page">
                <div class="b_page011">
                    <ul>
                        <form name="selectPageForm" action="/exchange.php" method="get" id="selectPageForm">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--兑换产品 完-->
<section>
    <div class="container footer">
        <div class="footer">
            <div class=" w1200_2 m0auto">
                <div class="S-link">
                    <ul>
                        <li>
                            <a href="#" class="text7"><img src="/Public/Home/images/bg_public_1.jpg"></a>
                            <a href="http://soujiufang.com/article.php?id=1" title="用户协议" class="text8">用户协议</a>
                            <a href="http://soujiufang.com/article.php?id=2" title="常见问题" class="text8">常见问题</a>
                            <a href="http://soujiufang.com/article.php?id=3" title="网站购物流程" class="text8">网站购物流程</a>
                            <a href="http://soujiufang.com/article.php?id=4" title="会员制度" class="text8">会员制度</a>
                            <a href="http://soujiufang.com/article.php?id=5" title="VIP客户与合作" class="text8">VIP客户与合作</a>
                        </li>
                        <li>
                            <a href="#" class="text7"><img src="/Public/Home/images/bg_public_2.jpg"></a>
                            <a href="http://soujiufang.com/article.php?id=6" title="如何付款" class="text8">如何付款</a>
                            <a href="http://soujiufang.com/article.php?id=7" title="发票制度说明" class="text8">发票制度说明</a>
                            <a href="http://soujiufang.com/article.php?id=8" title="电子券说明" class="text8">电子券说明</a>
                            <a href="http://soujiufang.com/article.php?id=9" title="虚拟账户支付" class="text8">虚拟账户支付</a>
                            <a href="http://soujiufang.com/article.php?id=10" title="商品优惠代码说明" class="text8">商品优惠代码说明</a>
                        </li>
                        <li>
                            <a href="#" class="text7"><img src="/Public/Home/images/bg_public_3.jpg"></a>
                            <a href="http://soujiufang.com/article.php?id=11" title="配送收费标准" class="text8">配送收费标准</a>
                            <a href="http://soujiufang.com/article.php?id=12" title="配送时间" class="text8">配送时间</a>
                            <a href="http://soujiufang.com/article.php?id=13" title="货到付款支持城市" class="text8">货到付款支持城市</a>
                        </li>
                        <li>
                            <a href="#" class="text7"><img src="/Public/Home/images/bg_public_4.jpg"></a>
                            <a href="http://soujiufang.com/article.php?id=14" title="如何办理退换货" class="text8">如何办理退换货</a>
                            <a href="http://soujiufang.com/article.php?id=15" title="如何退款" class="text8">如何退款</a>
                            <a href="http://soujiufang.com/article.php?id=16" title="联系客服" class="text8">联系客服</a>
                        </li>
                        <li>
                            <a href="#" class="text7"><img src="/Public/Home/images/bg_public_5.jpg"></a>
                            <a href="http://soujiufang.com/article.php?id=17" title="了解搜酒坊" class="text8">了解搜酒坊</a>
                            <a href="http://soujiufang.com/article.php?id=18" title="加入我们" class="text8">加入我们</a>
                            <a href="http://soujiufang.com/article.php?id=19" title="联系我们" class="text8">联系我们</a>
                            <a href="http://soujiufang.com/article.php?id=20" title="隐私声明" class="text8">隐私声明</a>
                            <a href="http://soujiufang.com/article.php?id=21" title="友情链接" class="text8">友情链接</a>
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
                        长春市公安局朝阳分局备案编号110105014669  |  京ICP证070359号  |  <a href="#">互联网药品信息服务资格证编号(京)-经营性-2014-0008</a>  |  新出发京零 字第大120007号<br>
                        <a href="#">音像制品经营许可证苏宿批005号</a>  |  出版物经营许可证编号新出发(苏)批字第N-012号  |  互联网出版许可证编号新出网证(京)字150号<br>
                        网络文化经营许可证京网文[2014]2148-348号  违法和不良信息举报电话：4006555555  Copyright © 2004-2015  诚佰CB.com 版权所有<br>
                        诚佰旗下网站：360TOP  <a href="#">拍拍网</a>  <a href="#">网银在线</a>
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
<div id="loginform" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>帐号登录</h3>
    </div>
    <form action="<?php echo U('Login/loginHandle');?>" method="post" class="form-horizontal">
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="inputEmail">用户名</label>
                <div class="controls">
                    <input type="text" id="inputEmail" placeholder="用户名">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">密码</label>
                <div class="controls">
                    <input type="password" id="inputPassword" placeholder="密码">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox"> 保存密码
                    </label>
                    <button type="submit" class="btn btn-primary">登陆</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>