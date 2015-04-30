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
<link type="text/css" rel="stylesheet" href="/Public/Home/css/regist.personal.css">
<link type="text/css" rel="stylesheet" href="/Public/Home/css/passport.base.css">
<script type="text/javascript" src="/Public/Home/js/jquery.validate.min.js"></script>
<div class="w ld" id="toppanel">
    <div class="w" id="reg_logo">
        <div><a href="/"><img src="/Public/Home/images/logo.png" alt="诚佰商城" width="170" height="60"></a> <b></b>
        </div>
    </div>
    <div class="w" id="regist">
        <div class="mt">
            <ul class="tab">
                <li class="curr">个人用户</li>
            </ul>
            <div class="extra">
                <span class="text-right">我已经注册，现在就&nbsp;<a href="<?php echo U('Login/index');?>" class="flk13"
                style="color:#dd0000">登录</a></span>
            </div>
        </div>
        <div class="mc">
            <form id="personRegForm" method="POST" action="<?php echo U('Register/registerHandle');?>">
                <div class="item">
                    <label class="fl label" for="user_name"><b class="ftx04">*</b>用户名：</label>
                    <div class="fl item-ifo">
                        <input type="text" id="user_name" name="user_name" maxlength="20" class="text" value="">
                    </div>
                </div>
                <div class="item">
                    <label class="fl label"><b class="ftx04">*</b>邮箱：</label>
                    <div class="fl item-ifo">
                        <input type="text" id="email" name="email" maxlength="20" class="text" value="">
                    </div>
                </div>
                <div class="item">
                    <label class="fl label"><b class="ftx04">*</b>请设置密码：</label>
                    <div class="fl item-ifo">
                        <input type="password" id="password" name="password" maxlength="20" class="text"
                        style="ime-mode:disabled;" onpaste="return  false">
                    </div>
                </div>
                <div class="item">
                    <label class="fl label"><b class="ftx04">*</b>请确认密码：</label>
                    <div class="fl item-ifo">
                        <input type="password" id="rpassword" name="rpassword" maxlength="20" class="text"
                        onpaste="return  false">
                    </div>
                </div>
                <div class="item">
                    <label class="fl label"><b class="ftx04">*</b>验证手机：</label>
                    <div class="fl item-ifo">
                        <input type="text" id="telephone" name="telephone" maxlength="20" class="text"
                        onpaste="return  false">
                    </div>
                </div>
                <div class="item">
                    <label class="fl label"><b class="ftx04">*</b>短信验证码：</label>
                    <div class="fl item-ifo">
                        <input type="text" id="captcha" name="captcha" maxlength="20" class="text" style="width:100px"
                        onpaste="return  false">
                        <input type="button" class="btn" id="send_captcha" value="获取短信验证码" />
                    </div>
                </div>
                <div class="item">
                    <label class="fl label">&nbsp;</label>
                    <div class="fl item-ifo">
                        <input type="checkbox" class="fl checkbox" checked="checked" id="readme">
                        <label for="protocol" class="fl mt10">我已阅读并同意<a href="#" class="blue" id="protocol">《用户注册协议》</a></label>
                    </div>
                </div>
                <div class="item">
                    <label class="fl label">&nbsp;</label>
                    <input type="submit" class="fl btn-img btn-regist hover-btn" id="registsubmit" value="立即注册"
                    tabindex="8"/>
                </div>
            </div>
            <span class="clr"></span>
        </form>
    </div>
</div>
<script>
    var __SEND_CAPTCHA__ = "<?php echo U('Register/send_captcha');?>";
    var __CHECK_TELEPHONE__ = "<?php echo U('Register/check_telephone');?>";

    $(function () {
        $("#personRegForm").validate({
            rules: {
                user_name: {
                    required: true,
                    remote: {
                        type: "POST",
                        url: "<?php echo U('Register/checkUserName');?>",
                        data:{
                            user_name:function () {
                                return $("#user_name").val();
                            }
                        }
                    }
                },
                email:{
                    required:true,
                    email:true,
                    remote:{
                        type:"POST",
                        url:"<?php echo U('Register/checkEmail');?>",
                        data:{
                            user_name:function () {
                                return $("#user_name").val();
                            }
                        }
                    }
                },
                telephone:{
                    required:true,
                    number:true
                },
                password: {
                    required: true,
                    minlength:6
                },
                rpassword: {
                    required: true,
                    minlength:6,
                    equalTo:"#password"
                },
                captcha: {
                    required:true
                }
            },
            messages: {
                user_name: {
                    required:'用户名不能为空',
                    remote:'用户名已经存在'
                },
                email: {
                    required:'邮箱不能为空',
                    email:'不是正确的邮箱',
                    remote:'邮箱已经存在'
                },
                telephone:{
                    required:'电话号码不能为空',
                    number:'电话号码只能是数字'
                },
                password: {
                    required:'密码不能为空',
                    minlength:'长度不能小于6'
                },
                rpassword: {
                    required:'确认密码不能为空',
                    minlength:'长度不能小于6',
                    equalTo:'两次密码不相等'
                },
                captcha:{
                    required:'验证码不能为空'
                }
            }
        });

        $("#registsubmit").click(function () {
            if ($('#personRegForm').valid()) {
                return true;
            } else {
                return false;
            }
        });

        $("#send_captcha").click(function(){
            if(validate_telephone()){
                var telephone = $("#telephone").val();
                alert('验证码已经发送！');

                $(this).countdown({
                    time : 90
                });
              
                $.ajax({
                    url: __SEND_CAPTCHA__,
                    type: "POST",
                    data: {'telephone':telephone},
                    dataType: "html",
                    success: function(data){

                    }
                });
            }else{
                alert('不是正规手机号码！');
            }
        });
    });

    
    function validate_telephone(){
        var pattern = /^[1-9]\d{10}$/;
        var telephone = $("#telephone").val();
        if(!pattern.test(telephone)){
            return false;
        }else{
            return true;
        }
    }

    (function($){
        $.fn.countdown = function(options) {    
            var defaults = {
                time : 60,
                text : "秒后重新发送",
                stop : 0,
                old_val : this.val()
            }

            var options = $.extend({}, defaults, options);    
   
            this.each(function() {    
                $this = $(this);
                old_value = $this.val();
                $this.attr("disabled", true);
                
                interval = setInterval(function(){
                    if(options.time>0){
                        options.time--;
                        $this.val(options.time + options.text);  
                    }else{
                        clearInterval(interval);
                        $this.val(old_value);
                        $this.attr("disabled", false);
                    } 
                    
                },1000);
                
            });    
        }
    
    })(jQuery);
</script>
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