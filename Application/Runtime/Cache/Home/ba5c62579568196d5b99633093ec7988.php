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

<div class="content w1200 m0auto">
	<div class="route"><span>当前位置：</span><a class="route-text" href="<?php echo U('User/index');?>">首页</a><span>〉</span><a>用户中心</a></div><div class="content-left">
    <ul>
        <li><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('User/index');?>">欢迎页</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
        <li><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('User/profileSetting');?>">基本信息</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
        <li><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('User/passwordSetting');?>">密码安全</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
        <li><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('User/orderlistSetting');?>">订单页面</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
        <li><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('User/collectionlistSetting');?>">收藏页面</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
        <li><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('User/addresslistSetting');?>">地址信息</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
        <li><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('Cart/showCart');?>">购物车</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
        <li class="last"><div class="list-type"><img src="/Public/Home/images/xing.png" /></div><span><a href="<?php echo U('User/exchangeSetting');?>">兑换中心</a></span><div class="sign"><img src="/Public/Home/images/xing.png" /></div></li>
    </ul>
</div>
<style type="text/css">
.content{margin-top:-10px; margin-bottom:20px;}
.route{width:100%;margin-top:10px; line-height:30px; float:left;}
.route span{display:block; float:left;}
.route a{display:block; padding:0 5px 0 0; float:left;}
.route a.route-text{color:#F00;}
.content-left{float:left; width:250px; margin:5px; border:#6CF 1px solid;}
.content-left ul li{width:240px; margin:5px; float:left; line-height:35px; font-size:20px; font-weight:700; color:#666; border-bottom:#CCC 1px dashed;}
.content-left ul li.last{border-bottom:none;}
.content-left ul li .list-type{width:20px; height:20px; float:left; margin-right:10px;}
.content-left ul li span{float:left;}
.content-left ul li .sign{float:right; width:20px; height:20px;}
.content-right{width:900px; float:right;border:#6CF 1px solid; margin:5px 18px;}
.content-right .login-info{width:880px; margin:5px 10px; padding:0 5px;}
.content-right .login-info h3{ text-align:center; line-height:50px; font-size:25px;}
.content-right .login-info h3 span{color:red;font-size:22px; font-family:"Courier New", Courier, monospace; padding:0 10px;}
.content-right .login-info ul{width:870px; margin:0 auto;}
</style>
	<div class="content-right">
        <div class="page-header">
            <h2>个人资料</h2>
        </div>
    	<form action="<?php echo U('User/saveProfile');?>" method="post" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="email">邮箱</label>
            <div class="controls">
              <span><?php echo ($user_info["email"]); ?></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="telephone">电话</label>
            <div class="controls">
              <span><?php echo ($user_info["telephone"]); ?></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="qq">QQ</label>
            <div class="controls">
              <input type="text" name="qq" id="qq" placeholder="QQ" value="<?php echo ($user_info["qq"]); ?>">
            </div>
          </div>
          
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-primary">保存</button>
            </div>
          </div>
        </form>
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