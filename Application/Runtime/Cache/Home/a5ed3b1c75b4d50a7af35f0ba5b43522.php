<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Home/css/common.css" rel="stylesheet">
        <link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <LINK rel=stylesheet type=text/css href="/Public/Home/css/lottery.css">
        <SCRIPT type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></SCRIPT>
        <SCRIPT type="text/javascript" src="/Public/Home/js/awardRotate.js"></SCRIPT>
        <SCRIPT type="text/javascript">
                var __RANDOM_INIT__="<?php echo U('Lottery/randomInit');?>";
                $(function () {
                    var rotateTimeOut = function () {
                        $('#rotate').rotate({
                            angle: 0,
                            animateTo: 2160,
                            duration: 8000,
                            callback: function () {
                                alert('网络超时，请检查您的网络设置！');
                            }
                        });
                    };
                    var bRotate = false;
                    var rotateFn = function (awards, angles, txt) {
                        bRotate = !bRotate;
                        $('#rotate').stopRotate();
                        $('#rotate').rotate({
                            angle: 0,
                            animateTo: angles + 1800,
                            duration: 10000,
                            callback: function () {
                                alert(txt);
                                bRotate = !bRotate;
                            }
                        })
                    };
                    $('.pointer').click(function () {
                        if (bRotate)return;
                        var datainfo = '';
                        $.ajax({
                            url:__RANDOM_INIT__,
                            async:true,
                            dataType:'json',
                            success: function(data){
                               
                                if(data.islogin==0){
                                    alert('您未登录！');
                                    return;
                                }
                                if(data.haspoints==0){
                                    alert('您的积分不够');
                                    return;
                                }
                                var angle = 360/data.num;
                                angle = data.prize*angle;
                                rotateFn(data.prize,angle,data.message);
                            }
                        });
                    
                    });
                });
        </SCRIPT>
        <title>抽奖</title>
    </head>
    <body>
        <div>
            <div class="bj">
                <div class="zi"><img src="/Public/Home/images/1.jpg" alt=""/></div>
                <div class="cl"><img src="/Public/Home/images/4.png" alt=""/></div>
                <div class="cl-1"><img src="/Public/Home/images/3.png" alt=""/></div>
                <div class="zk">
                    <img src="/Public/Home/images/3.jpg" alt=""/>
                    <div class="prize_text">
                        <h3>抽奖说明:</h3>
                        <ol>
                            <li>先登录</li>
                            <li>抽奖一次话费20积分</li>
                            <li>本活动解释权归本公司所有</li>
                        </ol>
                    </div>
                    <div class="prize_info">
                        <ul>
                            <li>**小**用户中了10等奖了..</li>
                            <li>**里**用户中了11等奖了..</li>
                            <li>**fly**用户中了8等奖了..</li>
                            <li>**宇航**用户中了1等奖了..</li>
                        </ul>
                    </div>
                </div>
                <div class="zkz"><img src="/Public/Home/images/5.jpg" alt=""/></div>
                <div class="cj" style="width:1000px;height:1000px;">
                    <DIV class="turntable-bg">
                        <DIV class="pointer">
                            <IMG alt="pointer" src="/Public/Home/images/pointer.png">
                        </DIV>
                        <DIV class="rotate">
                            <IMG id="rotate" alt="turntable" src="/Public/Home/images/turntable2.png">
                        </DIV>
                    </DIV>
                </div>

            </div>
            <div class="dbj">
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
        </div>
    </body>
</html>