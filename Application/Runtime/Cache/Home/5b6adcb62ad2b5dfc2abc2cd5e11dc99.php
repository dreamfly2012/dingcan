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
    var __DEL_COLLECT_GOODS_URL__ = "<?php echo U('User/delAjaxCollcetGoods');?>";


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
<link rel="stylesheet" type="text/css" href="/Public/Home/css/login.css" media="all">
<script type="text/javascript" src="/Public/Home/js/login2015.js"></script>

<div class="container">
    <div id="logo"><a href="/" ><img src="/Public/Home/images/logo.png" alt="诚佰" style="width:170px;height:60x;"></a><b></b></div>
</div>

<div style="background-color: #00cfa5">
    <div class="container">
        <div class="login-wrap">
            <div class="w">
                <div class="login-form">
                    <div class="login-box">
                        <div class="mt">
                            <h1>诚佰会员</h1>
                            <div class="extra-r">
                                <div class="regist-link"><a href="<?php echo U('Register/index');?>" target="_blank"><b></b>立即注册</a></div>
                            </div>
                        </div>
                        <div class="msg-wrap">
                            <div class="msg-warn"><b></b><span style="float: left;position: absolute;top: 50%;left: 30px;display: block;margin-top: -8px;height: 17px;font-size: 12px;">公共场所不建议自动登录，以防账号丢失</span></div>
                        </div>
                        <div class="mc">
                            <div class="form">
                                <form id="formlogin" method="post" action"<?php echo U('Login/loginHandle');?>" onsubmit="return false;">
                                    <div class="item item-fore1">
                                        <label for="user_name" class="login-label name-label"></label>
                                        <input id="user_name" type="text" class="itxt" name="user_name" tabindex="1" autocomplete="off" placeholder="用户名">
                                        <span class="clear-btn"></span>
                                    </div>
                                    <div id="entry" class="item item-fore2">
                                        <label class="login-label pwd-label" for="password"></label>
                                        <input type="password" id="password" name="password" class="itxt itxt-error" tabindex="2" autocomplete="off" placeholder="密码">
                                        <span class="clear-btn"></span>
                                    </div>
                                    <div class="item item-fore3">
                                        <div class="safe">
                                            <span>
                                            <input id="chkRememberMe" name="chkRememberMe" type="checkbox" class="jdcheckbox" tabindex="3">
                                            <label for="chkRememberMe">自动登录</label>
                                            </span>
                                            <span class="forget-pw-safe">
                                            <a href="<?php echo U('Login/forgetPassword');?>" target="_blank">忘记密码?</a>
                                            </span>
                                        </div>
                                        
                                    </div>

                                    <div class="item item-fore5">
                                        <div class="login-btn">
                                            <input type="hidden" name="returnUrl" vaule="<?php echo I('request.returnUrl');?>">
                                            <a href="javascript:;" class="btn-img btn-entry" id="loginsubmit" tabindex="6">登&nbsp;&nbsp;&nbsp;&nbsp;录</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="coagent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-banner" style="background-color: #00cfa5">                      
                                
            </div>
        </div>
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