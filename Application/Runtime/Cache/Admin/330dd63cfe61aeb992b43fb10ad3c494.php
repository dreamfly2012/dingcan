<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="GBK">
    <title>修改密码</title>
</head>
<body>
    <table cellpadding="0" cellspacing="0" border="0" width="640" style="margin:0 auto;color:#555; font:16px/26px '微软雅黑','宋体',Arail; ">
        <tbody>
            <tr style="background-color:#fff;">
                <td style="padding:10px 38px;">
                    请点击以下链接验证你的邮箱地址，验证后就可以使用巨搜商城的所有功能啦! <br>
                    <div style=" word-break:break-all;word-wrap:break-word;">
                        <a href="#server#<?php echo U('User/checkEmail');?>?code=#code#" target="_blank" style="color:#019875; text-decoration:underline;">#server#<?php echo U('User/checkEmail');?>?code=#code#</a><br>
                    </div>
                    <div style="margin:5px 0 20px 0; font-size:13px;">如果以上链接无法访问，请将该网址复制并粘贴至新的浏览器窗口中。</div>
                    <div>祝职业更上一层楼！</div>

                    <div style="color:#c5c5c5; font-size:12px; border-top:1px solid #e6e6e6; padding:7px 0; line-height:20px;">
                        本邮件是用户注册巨搜商城后系统自动发出，如果你并未注册巨搜商城，可能是因为其他用户误输入了你的邮箱地址而使你收到了这封邮件，你可以点击这里	<a href="http://www.lagou.com:80/reset.html?email=fujia0@qq.com" target="_blank" style="color:#019875; text-decoration:underline;">修改密码。</a>
                    </div>
                    <div style="font-size:12px; color:#999;line-height:20px;border-top:1px solid #e6e6e6;padding:10px 0;">
                        如有任何问题，可以与我们联系，我们将尽快为你解答。<br>
                        Email：<a href="mailto:test@qq.com" target="_blank">test@qq.com</a> ，电话：<span style="border-bottom:1px dashed #ccc;z-index:1" t="6" onclick="return false;" data="400-605-9900">400-605-9900</span>，QQ:<span style="border-bottom:1px dashed #ccc;z-index:1" t="6" onclick="return false;" data="800056379">800056379</span>
                    </div>
                </td>
            </tr>
         </tbody>
    </table>
</body>
</html>