<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <TITLE></TITLE>
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
                    async:false,
                    dataType:'json',
                    success: function(data){
                        datainfo.num = data.num;
                        datainfo.islogin = data.islogin;
                        datainfo.haspoints = data.haspoints;
                        datainfo.prize = data.prize;
                        datainfo.message = data.message;
                    }
                });

                if(datainfo.islogin==0){
                    alert('您未登录！');
                    return;
                }
                if(datainfo.haspoints==0){
                    alert('您的积分不够');
                }

                var angle = 360/num ;
                angle = item*angle;
                rotateFn(item,angle,message);
            });
        });
    </SCRIPT>
    <META name="GENERATOR" content="MSHTML 8.00.7600.17267">
</head>
<BODY bgcolor="transparent" style="background-color: transparent">

</BODY>
</html>