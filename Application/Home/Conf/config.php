<?php

//系统配置
$systemConfig =  array(
    //'配置项'=>'配置值'
    'BDT_Id'=>'300',
    'BDT_Name'=>'jusouwang',
    'BDT_Psw'=>'jusou123',
    // 'BDT_Name'=>'dreamfly',
    // 'BDT_Psw'=>'fujia0',
    'BDT_Message'=>'尊敬的客户,您的验证码是',
    'BDT_URL'=>'http://223.4.21.214:8180/service.asmx/SendMessageStr',
    'TMPL_PARSE_STRING'=>array(
        '__UPLOADS__'=>'/Uploads',
    ),
    'KEEP_COOKIE_TIME'=>'60*60*24',
    'EMPTY_COUPON'=>'请输入购物券',
    'ERROR_NO_LOGIN'=>'您没有登录，请先登录',
    'ERROR_COUPON'=>'购物券码或者密码不正确',
    'SUCCESS_COUPON_EXCHANGE'=>'购物券兑换成功',
    'ERROR_CART_EMPTY'=>'购物车为空',
    'ERROR_EMAIL'=>'邮箱错误',
    'INVILID_OPERATE'=>'非法操作',
    'SUCCESS_UPDATE_CART'=>'成功更新购物车',
    'ERROR_GOODS_NUMBER'=>'超出库存',
    'SUCCESS_UPDATE_USERINFO'=>'修改个人信息成功',
    'LABEL_CANCEL_ORDER'=>'取消订单',
    'LABEL_CONFIRM_CANCEL'=>'是否确认取消订单',
    'LABEL_HAVE_RECEIVED'=>'已经收获',
    'LABEL_PAY_MONEY'=>'付款',
    'LABEL_VIEW_ORDER'=>'查看订单详情',
    'LABEL_CONFIRM_RECEIVE'=>'是否确认收获',
    'LABEL_RECEIVE_ORDER'=>'确认收获',


);

//TODO:淘宝账号配置,需要保存到数据库
$aliPayConfig = array(
    'aliPayConfig' => array(
        'partner' =>'2088402894270141',
        'key'=>'phj5ecsel8s73afva50tstjpuhkw7upg',
        'sign_type'=>strtoupper('MD5'),
        'input_charset'=> strtolower('utf-8'),
        'transport'=> 'http',
        'seller_email'=>'2380909990@qq.com',
        'notify_url'=> U('Pay/notifyUrl'),//'http://www.jsshop.com/Pay/notifyUrl',
        'return_url'=> U('Pay/returnUrl')//'http://www.jsshop.com/Pay/returnUrl'
    )
);


return array_merge($systemConfig, $aliPayConfig);